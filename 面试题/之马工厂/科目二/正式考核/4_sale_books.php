<?php
//定义Book类
class Book
{

    protected $name;   //书名
    protected $author; //作者
    protected $pub;    //出版社
    protected $price;  //价格

    public function __construct($name, $author, $pub, $price)
    {
        //补写代码处
        $this->name = $name;
        $this->author = $author;
        $this->pub = $pub;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function updatePrice($price, $discount)
    {
        if ($this->price > $price) {
            $this->price = $this->price * $discount * 0.1;
        }
    }
}

//实例化Book类
$mybook = new Book('《平凡的的世界》', '路遥', '人民文学出版社', 99);

//输出图书名称
echo '图书名称：' . $mybook->getName();
echo '<br/>';
echo '市场价：' . $mybook->getPrice();
echo '<br/>';

//如果价格高于90元，将价格改为7折
$mybook->updatePrice(90, 7);

//输出新价格
echo '销售价：' . $mybook->getPrice();
// 图书名称：《平凡的的世界》<br/>市场价：99<br/>销售价：69.3
