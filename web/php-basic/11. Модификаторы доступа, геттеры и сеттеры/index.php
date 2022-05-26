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

    public function __get(string $name): string
    {
        echo 'Обращение к __get';

        if ($name === 'title') {
            return $this->title;
        }
        if ($name === 'text') {
            $this->storeText();
            return $this->text;
        }
    }

    public function __set(string $name, $value): void
    {
        echo 'Обращение к __set';

        if ($name === 'title') {
            $this->title = $value;
        }
        if ($name === 'text') {
            $this->loadText();
            $this->text = $value;
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

    public function editText(string $title, string $text): void
    {
        $this->title = $title;
        $this->text = $text;
    }
}

abstract class Storage implements LoggerInterface, EventListenerInterface
{
    abstract public function create(object $obj): string;

    abstract public function read(string $slug): object|null;

    abstract public function update(string $slug, object $obj): void;

    abstract public function delete(string $slug): void;

    abstract public function list(): array;

    public function logMessage(string $test): void
    {
        echo '[Storage] Запись сообщения в лог' . PHP_EOL;
    }

    public function lastMessages(int $messageCount): array
    {
        echo '[Storage] Получение списка ' . $messageCount . ' последних сообщений из лога' . PHP_EOL;
        return [];
    }

    public function attachEvent(string $nameFunc, callable $callbackFunc): void
    {
        echo '[Storage] Присвоиние событию обработчика' . PHP_EOL;
    }

    public function detouchEvent(string $nameFunc): void
    {
        echo '[Storage] Удаление обработчика события' . PHP_EOL;
    }
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

abstract class User implements EventListenerInterface
{
    protected int $id;
    protected string $name;
    protected string $role;

    abstract public function getTextsToEdit(): void;

    public function attachEvent(string $nameFunc, callable $callbackFunc): void
    {
        echo '[User] Присвоиние событию обработчика' . PHP_EOL;
    }

    public function detouchEvent(string $nameFunc): void
    {
        echo '[User] Удаление обработчика события' . PHP_EOL;
    }
}

class FileStorage extends Storage
{
    public function logMessage(string $test): void
    {
        parent::logMessage($test);
    }

    public function lastMessages(int $messageCount): array
    {
        return parent::lastMessages($messageCount);
    }

    public function attachEvent(string $nameFunc, callable $callbackFunc): void
    {
        parent::attachEvent($nameFunc, $callbackFunc);
    }

    public function detouchEvent(string $nameFunc): void
    {
        parent::detouchEvent($nameFunc);
    }

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

interface LoggerInterface
{
    public function logMessage(string $test): void;

    public function lastMessages(int $messageCount): array;
}

interface EventListenerInterface
{
    public function attachEvent(string $nameFunc, callable $callbackFunc): void;

    public function detouchEvent(string $nameFunc): void;
}

$fileStorage = new FileStorage();

$text = new Text('Eugene', './file', $fileStorage);
$text->editText(
    'Заголовок',
    'Текст'
);

//$text->storeText();
//
//echo '<pre>';
//var_dump($text->loadText());
//echo '</pre>';

//$fileStorage->logMessage('test');
//$fileStorage->lastMessages(10);
//$fileStorage->attachEvent('testFunc', function () {
//    echo 'Вызов callback функции';
//});
//$fileStorage->detouchEvent('testFunc');

$text->setSlug('./file');
$text->setSlug('./file*');
