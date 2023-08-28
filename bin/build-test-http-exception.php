<?php
declare(strict_types=1);

include __DIR__ . '/../vendor/autoload.php';

use Ctw\Http\HttpStatus;

$pathOutput       = (string) realpath(__DIR__ . '/../test/HttpException');
$templateFilename = (string) realpath(__DIR__ . '/HttpExceptionTestTemplate.txt');
$template         = (string) file_get_contents($templateFilename);

$reflectionClass = new ReflectionClass(HttpStatus::class);

foreach ($reflectionClass->getConstants() as $statusCode) {

    if (!is_int($statusCode)) {
        continue;
    }

    $entity = (new HttpStatus($statusCode))->get();

    if ('' === $entity->exception) {
        continue;
    }

    $parts = explode('\\', $entity->exception);

    $NAME          = array_pop($parts);
    $MESSAGE       = sprintf('%d %s', $statusCode, str_replace("'", "\'", $entity->name));
    $STATUSCODE    = (string) $statusCode;
    $CUSTOMMESSAGE = 'Custom error message with a detailed description of the problem.';

    $buffer = $template;
    $buffer = str_replace('%%NAME%%', $NAME, $buffer);
    $buffer = str_replace('%%STATUSCODE%%', $STATUSCODE, $buffer);
    $buffer = str_replace('%%MESSAGE%%', $MESSAGE, $buffer);
    $buffer = str_replace('%%CUSTOMMESSAGE%%', $CUSTOMMESSAGE, $buffer);

    $filename = sprintf('%s/%sTest.php', $pathOutput, $NAME);
    file_put_contents($filename, $buffer);

    dump($filename);
}
