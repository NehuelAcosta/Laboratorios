<?php
// Definición de la clase Result, usada para representar el resultado de una operación
class Result
{
    // Propiedad pública que indica si el resultado es un fallo
    public bool $isFailure;

    // Propiedad pública que guarda el contenido (puede ser un mensaje de error o datos)
    public $content;

    // Método estático para crear un resultado de "fallo"
    // Recibe un mensaje de error como parámetro
    public static function failure(string $errorMessage) : Result
    {
        // Devuelve una nueva instancia de Result con isFailure=true y el mensaje de error como contenido
        return new Result(isFailure:true, content:$errorMessage);
    }

    // Método estático para crear un resultado "exitoso"
    // Puede recibir cualquier contenido (datos, mensaje, objeto, etc.)
    public static function success($content = null) : Result
    {
        // Devuelve una nueva instancia de Result con isFailure=false y el contenido indicado
        return new Result(isFailure:false, content:$content);
    }

    // Constructor privado, evita que la clase sea instanciada directamente
    // Solo puede ser usada desde los métodos estáticos success y failure
    private function __construct(bool $isFailure, $content)
    {
        $this->isFailure = $isFailure;
        $this->content = $content;
    }
}
