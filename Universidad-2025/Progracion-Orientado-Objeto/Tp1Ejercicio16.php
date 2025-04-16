<?php
//16. Cree una clase Libro que tenga los atributos ISBN, titulo, año de edición, editorial, nombre y apellido del autor. 
//Defina en la clase los siguientes métodos 
//a) Método constructor _ _construct() que recibe como parámetros los valores iniciales para los atributos de la clase. 
//b) Los método de acceso de cada uno de los atributos de la clase. 
//c) Método    toString() que retorne la información de los atributos de la clase. 
//d) perteneceEditorial($peditorial): indica si el libro pertenece a una editorial dada. Recibe como parámetro una editorial y devuelve un valor verdadero/falso. 
//e) aniosdesdeEdicion(): método que retorna los años que han pasado desde que el libro fue editado. 
//f) Cree un script TestLibro que: 
//1) defina el método iguales($plibro,$parreglo): dada una colección de libros, indica si el libro pasado por parámetro ya se encuentra en dicha colección. 
//2) defina el método librodeEditoriales($arreglolibros, $peditorial): método que retorna un arreglo asociativo con todos los libros publicados por la editorial dada. 3) cree al menos tres objetos libros e invoque a cada uno de los métodos implementados en la clase Libro. 


class libro
{
    private int $ISBN;
    private string $titulo;
    private  string $editorial;
    private  string $nombre;
    private  string $apellidoDelAutor;
    public function __construct(int $ISBN, string $titulo, string $editorial, string $nombre, string $apellidoDelAutor)
    {
        $this->ISBN = $ISBN;
        $this->titulo = $titulo;
        $this->editorial = $editorial;
        $this->nombre = $nombre;
        $this->apellidoDelAutor = $apellidoDelAutor;
    }
    public function getISBN()
    {
        return $this->ISBN;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getEditorial()
    {
        return $this->editorial;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellidoDelAutor()
    {
        return $this->apellidoDelAutor;
    }

    //setters
    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setApellidoDelAutor($apellidoDelAutor)
    {
        $this->apellidoDelAutor = $apellidoDelAutor;
    }
    public function __toString()
    {
        return "El ISBN del libro es, {$this->ISBN} titulo {$this->titulo} de la editorial {$this->editorial}, del autor {$this->nombre} {$this->apellidoDelAutor}. \n";
    }
    public function perteneceEditorial($editorial)
    {
        $pEditorial = readline("introducir la editorial: \n");
        if ($pEditorial == $this->editorial) {
            true
        }
    }
}
