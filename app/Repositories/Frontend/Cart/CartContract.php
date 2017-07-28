<?php namespace App\Repositories\Frontend\Cart;


interface CartContract
{
    /**
     * @return mixed
     */
    public function findAll();

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     *  @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * @param $data
     * @return mixed
     */
    public function check($data);

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id,$data);

    /**
     * @return array
     */
    public function response();
    /**
     * @return array
     */
    public function destroy($id);

}