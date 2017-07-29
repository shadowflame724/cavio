<?php namespace App\Repositories\Frontend\Cart;

use App\Exceptions\GeneralException;
use DB;

class EloquentCartRepository implements CartContract
{

    protected $_cart;

    public function findAll()
    {
        $this->_cart = cart()->get();
        if (is_null( $this->_cart)) {
            cart()->set();
            $this->_cart = cart()->get();
        }
        return $this->_cart;
    }

    public function find($id)
    {
        if (empty($this->_cart))
            $this->_cart = cart()->get();
        if (!empty($this->_cart[$id - 1]))
            return $this->_cart[$id - 1];

        throw new GeneralException('Товар не найден.');
    }

    public function check($data)
    {
        $cart = cart()->get();
        foreach ($cart as $goods) {
            $cart_data = [
                'goods_id' => $goods['goods_id'],
                'size' => $goods['size'],
            ];
            $diff = array_diff_assoc($data, $cart_data);
            if (empty($diff)) {
                return true;
            }
        }

    }

    public function create($data)
    {
        $this->findAll();
        $data['count'] = (int)$data['count'];

        if (empty($this->_cart)) {
            $this->_cart[] = $data;
        } else {
            $end = end($this->_cart);
            array_push($this->_cart, $data);
        }
        cart()->update($this->_cart);
        return $data;
    }

    public function update($id, $data)
    {
        $this->_cart = cart()->get();
        if(!empty($this->_cart)){
            foreach ($this->_cart as $key => $itemCart){
                if($itemCart['price_id'] == $id){
                    $item['price_id'] = $id;
                    $item['count'] = (int)$data['count'];
                    $this->_cart[$key] = $item;

                    cart()->update($this->_cart);
                    return $this->_cart;
                }
            }
        }
        return false;
    }

    public function destroy($id)
    {
        $this->_cart = cart()->get();
        if(!empty($this->_cart)){
            foreach ($this->_cart as $key => $cartItem){
                if($cartItem['price_id'] == $id){
                    unset($this->_cart[$key]);
                }
            }
        }
        cart()->update($this->_cart);
    }

    /**
     * @return array
     */
    public function response()
    {
        $this->findAll();
        $summ=0;
        $count=0;
        if (empty($this->_cart))
            return ['list_id' => [], 'items' => []];
        foreach ($this->_cart as $item) {
            $list_id[] = $item['id'];
            $list_goods_id[] = $item['goods_id'];
            $items[] = $item;
            $count=$count+$item['count'];
            $summ=(int)$summ+($item['count']*$item['price']);
        }
        return ['list_id' => $list_id,'list_goods_id' => $list_goods_id, 'items' => $items,'count'=>$count,'summ'=>$summ,'count_text'=>$this->get_rus($count, ['товар','товара','товаров'])];
    }

    function get_rus($fd, $forms)
    {
        if (!is_int($fd)&&is_float($fd))//а уж число ли это?
            return $forms[2];
        elseif(is_int($fd))
        {
            $prc = abs($fd) % 100;
            $prc_add = $prc % 10;
            if ($prc_add == 1)
                return $forms[0];
            if ($prc > 10 && $prc < 20)
                return $forms[2];
            if ($prc_add > 1 && $prc_add < 5)
                return $forms[1];
            return $forms[2];
        };
        return false;//нефик подсовывать ерунду
    }


}