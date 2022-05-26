<?php

class TelegraphText
{
    private string $title;
    private string $text;
    private string $author;
    private string $published;
    private string $slug;

    public function __construct(string $author, string $slug)
    {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date(
            'm/d/Y h:i:s a',
            time()
        );
    }

    public function storeText(): void
    {
        $arr = [
            'title' => $this->title,
            'text' => $this->text,
            'author' => $this->author,
            'published' => $this->published,
        ];

        file_put_contents(
            $this->slug,
            serialize($arr)
        );
    }

    public function loadText(): string
    {
        $slug = $this->slug;

        if (file_exists($slug)) {
            if (filesize($slug)) {
                $arr = unserialize(
                    file_get_contents($slug)
                );

                $this->title = $arr['title'];
                $this->text = $arr['text'];
                $this->author = $arr['author'];
                $this->published = $arr['published'];

                return $this->text;
            } else {
                return 'Файл пуст';
            }
        } else {
            return 'Файл не найден';
        }
    }

    public function editText(string $title, string $text): void
    {
        $this->title = $title;
        $this->text = $text;
    }
}

$telegraphText = new TelegraphText('Eugene', 'file.txt');

$telegraphText->editText(
    'Заголовок',
    'Текст'
);
$telegraphText->storeText();

echo $telegraphText->loadText() . PHP_EOL;
