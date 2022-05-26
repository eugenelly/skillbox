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

    public function __get(string $name): string|null
    {
        if ($name === 'title') {
            return $this->title;
        } else if ($name === 'text') {
            $this->loadText();
            return $this->text;
        } else {
            return null;
        }
    }

    public function __set(string $name, $value): void
    {
        if ($name === 'title') {
            $this->title = $value;
        }
        if ($name === 'text') {
            $this->text = $value;
            $this->storeText();
        }
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        if (strlen($author) < 120) {
            $this->author = $author;
        } else {
            echo 'Длина значения поля превышает допустимую';
        }
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug($slug): void
    {
        if (preg_match('/^[a-zA-Z\d\/_.]+$/', $slug)) {
            $this->slug = $slug;
        } else {
            echo '[$slug] Обнаружены недопустимые символы';
        }
    }

    public function getPublished(): string
    {
        return $this->published;
    }

    public function setPublished($published): void
    {
        if (strtotime($published) >= strtotime($this->published)) {
            $this->published = $published;
        }
    }

    private function storeText(): void
    {
        $this->fileStorage->create($this);
    }

    private function loadText(): object|null
    {
        return $this->fileStorage->read($this->slug);
    }

    public function addText(string $text): void
    {
        if (strlen($text) === 0 || strlen($text) >= 500) {
            set_error_handler(function (int $level, string $msg, string $file, int $line) {
                $content = file_get_contents('./input_text.php');

                $html = new DOMDocument();
                $html->loadHTML($content);

                $warning = $html->getElementById('warning');
                $warning->setAttribute('class', 'warning warning--visible');
            });
            throw new Exception('Длина не соответствует разрешенной');
        }
    }

    public function editText(string $title, string $text): void
    {
        $this->title = $title;
        $this->text = $text;
    }
}
