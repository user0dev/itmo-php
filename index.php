<?php
//var_dump(scandir(__DIR__));
    class MyJob {
        public $path;
        public $caption;
        function __construct($path, $caption) {
            $this->path = $path;
            $this->caption = $caption;
        }
    }
    class MyLesson {
        public $number;
        public $list = [];
        public function __construct($number) {
            $this->number = $number;
        }
    };
    function getTitle($file) {
        if (!file_exists($file)) {
            return '';
        }
        $format = '<title>$s</title>';
        $pattern = '/\<title\>(.*)\<\/title\>/i';
        $matches = [];
        $f = fopen($file, 'r');
        //$result = fscanf($f, $format);
        $text = fread($f, filesize($file));
        $result = '';
        if (preg_match($pattern, $text, $matches) == 1 && $matches > 1) {
            $result = trim($matches[1]);
        } 
        fclose($f);
        return $result;
    }

    $list = scandir(__DIR__);
    $pattern = '/lesson(\d{1,2})/i';
    $jobPattern = '/.*\.php$/i';
    $lessons = [];
    foreach ($list as $key => $value) {
        $matches = [];
        if (preg_match($pattern, $value, $matches) == 1 && is_dir($value) && count($matches) == 2) {
            $lesson = new MyLesson((int) $matches[1]);
            $jobs = [];
            //echo __DIR__ . DIRECTORY_SEPARATOR . $value;
            $jobslist = scandir(__DIR__ . DIRECTORY_SEPARATOR . $value);
            //var_dump($jobslist);
            foreach($jobslist as $path) {
                if (preg_match($jobPattern, $path) == 1) {
                    $title = getTitle(__DIR__ . DIRECTORY_SEPARATOR . $value . DIRECTORY_SEPARATOR . $path);
                    if ($title == 'Document' || $title == '') {
                        $title = $path;
                    }
                    $jobs[] = new MyJob($value . DIRECTORY_SEPARATOR . $path, $title);
                }
            }
            $lesson->list = $jobs;
            $lessons[] = $lesson;
            //$lessons[] = $matches[1];
            //var_dump(new MyLesson("Урок " . $matches[1]));
        }
    }
    $testDir = __DIR__ . DIRECTORY_SEPARATOR . 'test';
    $testList = [];
    if (is_dir($testDir)) {
        $testList = scandir($testDir);
        if ($testList == false) {
            $testList = [];
        }
    }
    $testList = array_filter($testList, function ($var) {
        return preg_match('/^[\w\d]+\.php$/i', $var) == 1;
    });
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Домашние задания</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        ul {
            margin-left: 30px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Все домашние задания по PHP</h1>
    <ul>
    <?php foreach ($lessons as $lesson): ?>
        <li>
            <h2>Урок <?= $lesson->number ?>:</h2>
            <ul>
                <?php foreach ($lesson->list as $job): ?>
                    <li><a href="<?= $job->path ?>">
                        <?= $job->caption ?>
                    </a></li>
                <?php endforeach; ?>
            </ul>
        </li>
    <?php endforeach; ?>
        <?php if (file_exists(__DIR__ . '/simple-blog/www/index.php')): ?>
            <li>
                <h2><a href="http://127.0.0.3:<?= $_SERVER["SERVER_PORT"] ?>">Простой блог</a></h2>
            </li>
        <?php endif; ?>
        <?php if (count($testList)): ?>
            <li>
            <h2>Тест:</h2>
            <ul>
                <?php foreach($testList as $name): ?>
                <li><a href="test/<?= $name ?>"><?= $name ?></a></li>
                <?php endforeach; ?>
            </ul>
            </li>
        <?php endif; ?>

    </ul>
</body>
</html>