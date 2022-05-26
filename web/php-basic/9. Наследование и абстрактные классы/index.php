<?php

class Text
{
    private string $title;
    private string $text;
    private string $author;
    private string $published;
    private string $slug;

    private Storage $fileStorage;

    public function __construct(string $author, string $slug, Storage $fileStorage)
    {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date(
            'm/d/Y h:i:s a',
            time()
        );

        $this->fileStorage = $fileStorage;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug($slug): void
    {
        $this->slug = $slug;
    }

    public function storeText(): void
    {
        $this->fileStorage->create($this);
    }

    public function loadText(): object|null
    {
        return $this->fileStorage->read($this->slug);
    }

    public function editText(string $title, string $text): void
    {
        $this->title = $title;
        $this->text = $text;
    }
}

abstract class Storage
{
    abstract public function create(object $obj): string;

    abstract public function read(string $slug): object|null;

    abstract public function update(string $slug, object $obj): void;

    abstract public function delete(string $slug): void;

    abstract public function list(): array;
}

abstract class View
{
    private object $storage;

    public function __construct($storage)
    {
        $this->storage = $storage;
    }

    abstract public function displayTextById($id): void;

    abstract public function displayTextByUrl($url): void;
}

abstract class User
{
    private int $id;
    private string $name;
    private string $role;

    abstract public function getTextsToEdit(): void;
}

class FileStorage extends Storage
{
    public function create(object $obj): string
    {
        $filename_ = $obj->getSlug(). '_' . date('d.m.Y');
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

$fileStorage = new FileStorage();

$text = new Text('Eugene', './file', $fileStorage);
$text->editText(
    'Заголовок',
    'Текст'
);

$text->storeText();

echo '<pre>';
var_dump($text->loadText());
echo '</pre>';
