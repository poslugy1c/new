<?php

echo '<p>2. Создать класс “Фигура” унаследовать от него три класса “Прямоугольник”, “Треугольник” и “Круг”. 
<br> Посчитать периметр и площадь фигуры. Объяснить на примере суть полиморфизма. 
<br> Некорректные входные данные, обработать исключительными ситуациями. 
<br> Нарисовать UML-диаграмму классов (интерфейсов).
 </p>';

abstract class Shape{
    abstract public function square();
    abstract public function perimetr();
}
 
 class Rectangle extends Shape{
     private $width;
     private $height;
 
     public function __construct($width, $height)
     {
         $this->width = $width;
         $this->height = $height;
     }

     private function testParam(){
        try {	
            if(gettype($this->width) != 'integer' || gettype($this->height) != 'integer'){
                throw new Exception('Один из переданный параметров  не является числом <br>');
            };
        } catch (Exception $e) {
           echo $e -> getMessage();
           return false;
        }; 
    }
 
     public function square(){
        if(!$this-> testParam()){
            return null;
        };
         return $this->width * $this->height;
     }
 
     public function perimetr(){
        if(!$this-> testParam()){
            return null;
        };
         return ($this->width + $this->height) * 2;
     }
 }

 class Triangle extends Shape{
    private $width;
    private $height;
    private $length;

    public function __construct($width, $height, $length)
    {
        $this->width = $width;
        $this->height = $height;
        $this->length = $length;
    }

    private function testParam(){
        try {	
            if(gettype($this->width) != 'integer' || gettype($this->height) != 'integer' || gettype($this->length) != 'integer'){
                throw new Exception('Один из переданный параметров  не является числом <br>');
            };
        } catch (Exception $e) {
           echo $e -> getMessage();
           return false;
        }; 
    } 

    public function square(){

        if(!$this-> testParam()){
            return null;
        };
       
        return ($this->width * $this->height)/2; 
    }

    public function perimetr(){

        if(!$this-> testParam()){
            return null;
        };

        return ($this->width + $this->height + $this->length) * 2;
    }
}
 
 class Circle extends Shape{
     private $radius;

     private function testParam(){
        try {	
            if(gettype($this->radius) != 'integer'){
                throw new Exception('Радиус не является числом <br>');
            };
        } catch (Exception $e) {
           echo $e -> getMessage();
           return false;
        }; 
    }
 
     public function __construct($radius)
     {
         $this->radius = $radius;
     }
 
     public function square(){
        if(!$this-> testParam()){
            return null;
        };
         return M_PI * $this->radius * $this->radius;
     }
 
     public function perimetr(){
        if(!$this-> testParam()){
            return null;
        };
         return 2 * M_PI * $this->radius;
     }
 }
 
 
 $rectangle = new Rectangle('xxx', 4);
 $circle = new Circle(100);
 $triangle = new Triangle(15, 20 , 25);
 
 echo 'периметр треугольника ' . $triangle ->perimetr();
 echo '<br>';
 echo 'площадь треугольника ' . $triangle ->square();
 echo '<br>';
 echo 'периметр круга ' . $circle ->perimetr();
 echo '<br>';
 echo 'площадь круга  ' . $circle ->square();
 echo '<br>';
 echo 'периметр прямоугольника ' . $rectangle ->perimetr();
 echo '<br>';
 echo 'площадь прямоугольника ' . $rectangle ->square();
 echo '<br>';