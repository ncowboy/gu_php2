<?php
/* Задание 1 - 4 */

/*
1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.
2. Описать свойства класса из п.1 (состояние).
3. Описать поведение класса из п.1 (методы).
4. Придумать наследников класса из п.1. Чем они будут отличаться? */

class Payment
{
  public $amount;
  public $state;
  public $datetime;

  public function __construct($amount, $datetime)
  {
    $this->state = 0;
    $this->amount = $amount;
    $this->datetime = $datetime;
  }


  public function process()
  {
    $this->state = 1;
    echo "Платеж {$this->amount}руб. проведён {$this->datetime}.";
  }

  public function cancel()
  {
    $this->state = 2;
  }
}

class CardPayment extends Payment
{
  public $cardMask;

  public function process()
  {
    $this->state = 1;
    echo "Платеж {$this->amount}руб. по карте {$this->cardMask}проведён {$this->datetime}.";
  }

}

class OnlinePayment extends CardPayment
{
  public $paymentSystem;

  public function process()
  {
    $this->state = 1;
    echo "Платеж {$this->amount}руб. по карте {$this->cardMask}проведён {$this->datetime} через
    платежную систему {$this->paymentSystem}.";
  }
}

/* Задание 5 */

/* 
5. Дан код:
Что он выведет на каждом шаге? Почему?
*/

class A
{
  public function foo()
  {
    static $x = 0;
    echo ++$x;
  }
}

$a1 = new A();
$a2 = new A();
$a1->foo();  // 1
$a2->foo();  // 2
$a1->foo();  // 3
$a2->foo();  // 4
//Префиксный инкремент. Свойство сначала увеличивается и сохраняется, потом выводится его значение.
//Поскольку свойство статическое и принадлежит классу, оно изменяется при вызове метода в каждом из
// экземпляров класса
 echo '<br>';
/*
6. Немного изменим п.5 Объясните результаты в этом случае.
*/

class A1 {
  public function foo() {
    static $x = 0;
    echo ++$x;
  }
}
class B extends A1 {
}
$a1 = new A1();
$b1 = new B();
$a1->foo(); // 1
$b1->foo(); // 1
$a1->foo(); // 2
$b1->foo(); // 2

// Одинаковое статическое свойство в каждом классе. В экземплярах каждого из класса они изменяются независимо
// друг от друга
echo '<br>';
/* 7* Дан код.
Что он выведет на каждом шаге? Почему?
 */
class A2 {
  public function foo() {
    static $x = 0;
    echo ++$x;
  }
}
class B2 extends A2 {
}
$a1 = new A2;
$b1 = new B2;
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();

// Выведет то же самое, так как классы те же самые, просто экземпляры создаются без передачи параметров в конструктор.
