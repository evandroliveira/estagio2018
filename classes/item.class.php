<?php
    /*
     * Active Record para tabela item
     */
    class Item extends TRecord {
        const TABLENAME = 'item';
        private $produto;
        /*
         * metodo get_descricao()
         * retorna a descrição do produto
         */
        function get_descricao() {
            //instancia produto, carrega
            //na memoria o produto de codigo $this->produto_id
            if(empty($this->produto))
                $this->produto = new Produto($this->produto_id);

        }
    }
?>