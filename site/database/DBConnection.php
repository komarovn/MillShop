<?php

/**
    MILL SHOP COMPANY, 2016
    CREATED BY NIKITA GRECHUKHIN, NIKOLAY KOMAROV AND VAGIK SIMONYAN
 */
class DBConnection
{
    private $link;
    private $query;
    private $result;

    public function openConnection(){
        $this->link = mysqli_connect('localhost:3306', 'root', 'root', 'millshop');
        if (!$this->link) {
            die('Ошибка соединения: ' . mysqli_error($this->link));
        }
        echo 'Соединение успешно установлено';
        mysqli_select_db($this->link, 'MillShop') or die('Не удалось выбрать базу данных');
    }

    public function execueQuery(){
        $this->result = mysqli_query($this->link, $this->query) or die('Запрос не удался: ' .mysqli_error($this->link));
    }

    public function setQuery($query)
    {
        $this->query = $query;
    }

    private function showImage($image, $width, $height) {
        echo "\t\t<td><img src=\"data:image/jpeg;base64," . base64_encode($image) .
            "\" width=\"" . $width . "\" height=\"" . $height . "\" /></td>\n";
    }

    public function showResult(){
        echo "<table>\n";
        while ($line = mysqli_fetch_array($this->result, MYSQLI_ASSOC)) {
            echo "\t<tr>\n";
            foreach ($line as $col_value) {
                if($col_value == $line['image']) {
                    $this->showImage($col_value, 175, 200);
                }
                else {
                    echo "\t\t<td>$col_value</td>\n";
                }
            }
            echo "\t</tr>\n";
        }
        echo "</table>\n";
    }

    public function closeConnection(){
        $isClose = mysqli_close($this->link);
        if ($isClose){
            echo "Соединение успешно прервано";
        }
    }

    public function selectItemsById($id){
        $query = "SELECT id, name, image, price, size, color, description FROM items WHERE id = '$id'";
        $this->setQuery($query);
        $this->execueQuery();
    }

    public function selectItemsBySize($size){
        $query = "SELECT id, name FROM items WHERE size = '$size'";
        $this->setQuery($query);
        $this->execueQuery();
    }

    public function selectItemsByColor($color){
        $query = "SELECT id, name FROM items WHERE color = '$color'";
        $this->setQuery($query);
        $this->execueQuery();
    }

    public function getResult(){
        return $this->result;
    }
}
?>