<?php

require_once 'Storage.php';

class FileStorage extends Storage
{
    public function create(object $obj): string
    {
        $filename_ = $obj->getSlug() . '_' . date('d.m.Y');
        $filename = $filename_ . '.txt';

        for ($index = 1; file_exists($filename); $index++) {
            $filename = $filename_ . '_' . $index . '.txt';
        }

        $obj->setSlug($filename);

        file_put_contents(
            $obj->getSlug(),
            serialize($obj)
        );

        return $obj->getSlug();
    }

    public function read(string $slug): object|null
    {
        if (!file_exists($slug)) {
            echo 'Файл не существует';
            return null;
        }

        if (!filesize($slug)) {
            echo 'Файл пустой';
            return null;
        }

        return unserialize(
            file_get_contents($slug),
            [Text::class]
        );
    }

    public function update(string $slug, object $obj): void
    {
        if (!file_exists($slug)) {
            echo 'Файл не существует';
        } else if (!filesize($slug)) {
            echo 'Файл пустой';
        }

        file_put_contents(
            $slug,
            serialize($obj)
        );
    }

    public function delete(string $slug): void
    {
        if (file_exists($slug)) {
            unlink($slug);
        } else {
            echo 'Файл уже был удален или не существует';
        }
    }

    public function list(): array
    {
        $list = [];

        foreach (new DirectoryIterator('./') as $fileInfo) {
            $filename = $fileInfo->getFilename();

            if (!$fileInfo->isDot() && $filename !== 'index.php') {
                continue;
            } else if (filesize($fileInfo->getPath() . $filename)) {
                $list[] = "Файл {$filename} пуст";
                continue;
            }

            $list[] = unserialize(
                file_get_contents($filename),
                [Text::class]);
        }
        return $list;
    }
}
