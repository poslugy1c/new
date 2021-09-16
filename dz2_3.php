<?php

echo '<p>3. Создайте класс с именем Logger, реализуйте все необходимые методы для работы с логированием данных:
<br> Обеспечьте возможность записи логов в файл
<br> Обеспечьте возможность задания уровня логов (TRACE, DEBUG, INFO, WARN, ERROR, FATAL)
<br> Файл с логами должен хранить следующую информацию (дата и время, сообщение, уровень), через разделитель  (по умолчанию точка с запятой).
<br> Обработать все возможные исключительные ситуации
<br> Продумать какие должны быть методы, параметры методов т.е. продумать структуру класса (Возможно это ряд классов… если это будет аргументированно)
<br> Реализовать pattern singleton для этого класса, - аргументировать, если считаете что singleton не допустим для этого задания - аргументировать
 </p>';

 class Log {
    private $path;
    private $message;

    public function __construct($path, $message)
    {
        $this->path = $path;
        $this->message = $message;
    }

    public function addLog(){

        $logFile = fopen($this->path, 'a+');
        $logText = PHP_EOL . date('Y.m.d h:i:s') . PHP_EOL . $this->message;
        fwrite($logFile, $logText);
        fclose($logFile); 
        
    }
}    

$newLog = new Log('log.txt', 'Test log ');
$newLog->addLog();
