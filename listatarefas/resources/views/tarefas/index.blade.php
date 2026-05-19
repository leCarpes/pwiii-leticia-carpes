<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sistema de Tarefas</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{

background:#f5f5f5;
padding:40px;

}

.container{

max-width:1200px;
margin:auto;

}

.titulo{

text-align:center;
font-size:35px;
color:#333;
margin-bottom:30px;

}

.card{

background:white;

padding:30px;

border-radius:15px;

margin-bottom:30px;

box-shadow:
0 3px 10px rgba(
0,0,0,.08
);

}

.form-grid{

display:grid;

grid-template-columns:
1fr 1fr;

gap:15px;

}

input,
textarea,
select{

width:100%;
padding:12px;

border-radius:10px;

border:1px solid #ddd;

margin-top:8px;

margin-bottom:15px;

}

textarea{

height:100px;
resize:none;

}

.botao{

width:100%;
padding:14px;

background:#374151;

color:white;

border:none;

border-radius:10px;

cursor:pointer;

font-size:15px;

}

.botao:hover{

opacity:.9;

}

.lista{

display:grid;

grid-template-columns:
repeat(
auto-fill,
minmax(300px,1fr)
);

gap:20px;

}

.item{

background:white;

padding:20px;

border-radius:15px;

box-shadow:
0 3px 10px rgba(
0,0,0,.08
);

}

.item h2{

color:#374151;

margin-bottom:10px;

}

.info{

margin-top:10px;
color:#666;

font-size:14px;

}

.badge{

display:inline-block;

padding:5px 12px;

border-radius:30px;

font-size:12px;

margin-top:15px;

color:white;

}

.baixa{

background:#6b7280;

}

.media{

background:#4b5563;

}

.alta{

background:#1f2937;

}

.excluir{

width:100%;

margin-top:15px;

padding:10px;

background:#dc2626;

color:white;

border:none;

border-radius:10px;

cursor:pointer;

}

.erro{

background:#fee2e2;

padding:15px;

margin-bottom:20px;

border-radius:10px;

color:#991b1b;

}

.sucesso{

background:#dcfce7;

padding:15px;

margin-bottom:20px;

border-radius:10px;

color:#166534;

}

</style>

</head>

<body>

<div class="container">

<h1 class="titulo">

Sistema de Tarefas

</h1>


@if(session('sucesso'))

<div class="sucesso">

{{session('sucesso')}}

</div>

@endif


@if($errors->any())

<div class="erro">

<ul>

@foreach($errors->all() as $erro)

<li>{{$erro}}</li>

@endforeach

</ul>

</div>

@endif


<div class="card">

<form method="POST" action="/tarefas">

@csrf

<div class="form-grid">

<div>

<label>Título</label>

<input
type="text"
name="titulo"
value="{{old('titulo')}}"
>

</div>

<div>

<label>Prioridade</label>

<select name="prioridade">

<option value="">
Selecione
</option>

<option>Baixa</option>
<option>Média</option>
<option>Alta</option>

</select>

</div>

</div>


<label>Descrição</label>

<textarea
name="descricao"
>{{old('descricao')}}</textarea>


<div class="form-grid">

<div>

<label>Data</label>

<input
type="date"
name="data_entrega"
>

</div>


<div>

<label>Categoria</label>

<select
name="categoria_id"
>

<option>

Selecione

</option>

@foreach(
$categorias as $categoria
)

<option
value="{{$categoria->id}}"
>

{{$categoria->nome}}

</option>

@endforeach

</select>

</div>

</div>

<button class="botao">

Cadastrar tarefa

</button>

</form>

</div>


<div class="lista">

@foreach(
$tarefas as $tarefa
)

<div class="item">

<h2>

{{$tarefa->titulo}}

</h2>

<p>

{{$tarefa->descricao}}

</p>

<div class="info">

📅 {{$tarefa->data_entrega}}

</div>

<div class="info">

📁 {{$tarefa->categoria->nome}}

</div>


@if($tarefa->prioridade=="Baixa")

<span class="badge baixa">

{{$tarefa->prioridade}}

</span>

@endif

@if($tarefa->prioridade=="Média")

<span class="badge media">

{{$tarefa->prioridade}}

</span>

@endif

@if($tarefa->prioridade=="Alta")

<span class="badge alta">

{{$tarefa->prioridade}}

</span>

@endif


<form
method="POST"
action="/tarefas/{{$tarefa->id}}"
>

@csrf
@method('DELETE')

<button class="excluir">

Excluir

</button>

</form>

</div>

@endforeach

</div>

</div>

</body>
</html>