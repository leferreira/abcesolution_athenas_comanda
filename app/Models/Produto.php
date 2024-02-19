<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Tenant\Traits\EmpresaTrait;


class Produto extends Model
{


    protected $fillable =[
        'empresa_id',
        'tipo_produto_id',
        'localizacao_id',
        'fornecedor_nota_id',
        'usa_grade',
        'sku',
        'nome',
       'CEST',
        'gtin',
        'sku',
        'codigo_barra',
        'gtin_trib',
        'imagem',
        'origem',
        'categoria_id',
        'subcategoria_id',
        'subsubcategoria_id',
        'unidade',
        'unidade_entrada',
        'valor_venda_atacado',
        'valor_atacado_apartir',
        'comissao',
        'fragmentacao_qtde',
        'fragmentacao_unidade',
        'fragmentacao_valor',
        'referencia',
        'qtde_venda',
        'valor_venda_atacado',
        'valor_atacado_apartir',
        'comissao',
        'validade',
        'ultima_compra',
        'valor_maior',
        'valor_venda',
        'valor_custo',
        'margem_lucro',
        'custo_medio',
        'estoque_minimo',
        'estoque_maximo',
        'estoque_inicial',
        'estoque_atual',
        'cfop',
        'pDif',
        'pMVAST',
        'pICMS',
        'pPIS',
        'pCOFINS',
        'pIPI',
        'pRedBC',
        'pRedBCST',
        'ncm',
        'cest',
        'cbenef',
        'tipi',
        'unidade_tributavel',
        'quantidade_tributavel',
        'produto_loja',
        'produto_delivery',
        'descricao',
        'controlar_estoque', 'status_id',
        'preco', 'destaque', 'cep', 'largura','comprimento','altura','peso_liquido','peso_bruto',
        'tributado_icms','tributado_ipi','tributado_pis','tributado_cofins','pRedBC',
        ];







}
