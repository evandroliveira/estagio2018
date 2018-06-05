<?php
    class Venda extends TRecord {
        const TABLENAME = 'venda';

        private $itens; //array de objetos do tipo Item

        /*
         * função additem()
         * adiciona um item(produto) à venda
         */
        public function addItem(Item $item) {
            $this->itens[] = $item;
        }

        /*
         * funcção store()
         * armazena uma venda e seus itens no banco de dados
         */
        public function store() {
            // armazena venda
            parent::store();

            //percorre os itens da venda
            foreach ($this->itens as $item) {
                $item->id_venda = $this->id;
                //aramazena o item
                $item->store();
            }
        }
    }

?>