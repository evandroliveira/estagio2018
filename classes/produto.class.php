<?php
  /*
   * classe produto
   * active record para tabela produto
   */

  class Produto extends TRecord {
      const TABLENAME = 'produto';
      private $fabricante;

      /*
       * metodo get_nome_fabricante()
       * retorna o nome do fabricante do produto
       */
      function get_nome_fabricante() {
          //instancia Fabricante, carrega
          //na memoria a a fabricante de codigo $this->id_fabricante
          if (empty($fabricante))
              $this->fabricante = new Fabricante($this->id_fabricante);
          //retorna o nome do fabricante
          return $this->fabricante->nome;
      }
  }

?>