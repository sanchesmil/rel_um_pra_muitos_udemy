<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Categoria;
use App\Produto;
use Illuminate\Support\Facades\Route;



Route::get('/categorias', function () {
    
    $cats = Categoria::all();

    if(count($cats) === 0){
        echo "<h4> Não existem categoiras cadastradas </h4>";
    }else{
        
        foreach($cats as $c){
            echo "<h3> Categoria: </h3>";
            echo "<ul> <li> " . $c->nome . "</li></ul>";
            $produtos  = $c->produtos;

            if(count($produtos) > 0){
                echo "<h4>Produtos da categoria: </h4>";
                echo "<ul>";
                foreach($c->produtos as $prod){
                    echo " <li>" . $prod->nome . " </li>";
                }
                echo "</ul> <hr>";
            }
        }
    }
});

Route::get('/produtos', function () {
    
    $prods = Produto::all();

    if(count($prods) === 0){
        echo "<h4> Não existem Produtos cadastrados </h4>";
    }else{
        echo "<h3> Produtos: </h3> <hr>";

        echo "<table> 
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Preço</td>
                        <td>Estoque</td>
                        <td>Categoria</td>
                    </tr>
                </thead>";
        foreach($prods as $p){
            echo "<tr> 
                    <td>" . $p->id . "</td>
                    <td>" . $p->nome . "</td>
                    <td>" . $p->preco . "</td>
                    <td>" . $p->estoque . "</td>
                    <td>" . $p->categoria->nome . "</td>  
                </tr>";
        }
        echo "</table>";
    }
});

// Retorna a Categoria com seus produtos
Route::get('/categoriasprodutos/json', function(){
    $cats1 = Categoria::all();  // Carregamento tardio (Lazy loading) = Não traz os relaciomentos

    $cats2 = Categoria::with('produtos')->get(); // Carregamento Rápido (Eager loading) = Traz os dados dos relaciomentos informados

    return $cats2->toJson();
});


// 2 FORMAS de Associar Instâncias entre si.

//1ª FORMA: Usando o método 'ASSOCIATE' ( maneira + elegante)

// Associar uma instância de 'Categoria' a um Produto usando o método 'ASSOCIATE'
Route::get('/associarcategorianoproduto', function(){
    $cat = Categoria::find(3); // Categoria informática

    $p = new Produto();
    $p->nome = "Meu novo Produto";
    $p->preco = 99.99;
    $p->estoque = 100;
    $p->categoria()->associate($cat); // Associa uma instância de categoria ao produto
    $p->save();

    return $p->toJson();
});

// Desassociar uma 'Categoria' de um Produto usando o método 'DISSOCIATE'
Route::get('/desassociarcategoriadeproduto', function(){
    $p = Produto::find(9);
    if(isset($p)){
        $p->categoria()->dissociate(); // Desassocia a instância de categoria do produto
        $p->save();

        return $p->toJson();
    }
    return '';
});

// 2ª FORMA de Associação: Usando o método 'SAVE()' 

// Associar um Produto a uma 'Categoria' usando o método SAVE()
Route::get('/adicionarprodutonacategoria/{cat_id}', function($cat_id){

    $cat = Categoria::with('produtos')->find($cat_id);  //Retorna a Categoria especificada com seus Produtos

    $prod = new Produto();
    $prod->nome = "Novo produto via Categoria";
    $prod->preco = 43.98;
    $prod->estoque = 50;

    if(isset($cat)){
        $cat->produtos()->save($prod);  // Associa uma instância de produto à categoria
    }

    $cat->load('produtos'); // Atualiza a lista de produtos na instância de Categorias

    return $cat->toJson();
    
});