<?php
class User
{
    protected $name;
    protected $lastname;
    protected $email;
    protected $password;
    protected $id;

    public function __construct($name, $lastname, $email, $password, $id)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->id = $id;
        $this->password = $this->passEncode($password);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($param)
    {
        $this->name = $param;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($param)
    {
        $this->lastname = $param;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($param)
    {
        $this->email = $param;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($param)
    {
        $this->password = passwordEncode($param);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($param)
    {
        $this->id = $param;
    }

    private function passEncode($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function verificarPass($password)
    {
        return (password_hash($password, PASSWORD_DEFAULT)) == ($this->password);
    }
}

class UserBuyer extends User
{
    protected Cart $cart;

    public function addProduct(Product $product)
    {
        $this->cart->addProduct($product);
    }
}


class Product
{
    protected $name;
    protected $price;
    protected $description;
    protected $image;

    public function __construct($name, $price, $description, $image)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($param)
    {
        $this->name = $param;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($param)
    {
        $this->price = $param;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($param)
    {
        $this->description = $param;
    }

    public function getimage()
    {
        return $this->image;
    }

    public function setimage($param)
    {
        $this->image = $param;
    }
}

class Cart
{
    protected $products;

    public function addProduct(Product $product)
    {
        $products[] = $product;
    }
}
