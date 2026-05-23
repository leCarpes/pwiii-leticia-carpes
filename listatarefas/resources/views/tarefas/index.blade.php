<!DOCTYPE html>
<html lang="pt-br">
<head>

    <!-- Define a codificação para aceitar acentos -->
    <meta charset="UTF-8">

    <!-- Faz a página adaptar em celulares -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título exibido na aba -->
    <title>Sistema de Tarefas</title>

<style>

/* ========================================
   RESET GERAL

   Remove margens e configurações padrões
======================================== */

*{
    margin:0;
    padding:0;

    /* Inclui bordas e padding no tamanho */
    box-sizing:border-box;

    /* Fonte padrão */
    font-family:Arial,sans-serif;
}

/* ========================================
   CORPO DA PÁGINA
======================================== */

body{
    background:#f3f4f6;
    padding:40px;
}

/* ========================================
   CONTAINER PRINCIPAL

   Centraliza o conteúdo
======================================== */

.container{
    max-width:1200px;
    margin:auto;
}

/* ========================================
   TÍTULO PRINCIPAL
======================================== */

.titulo{
    text-align:center;
    margin-bottom:30px;
    font-size:35px;
    color:#1f2937;
}

/* ========================================
   CARD DO FORMULÁRIO
======================================== */

.card{
    background:white;
    padding:30px;
    border-radius:15px;
    margin-bottom:30px;
    box-shadow:0 4px 10px rgba(0,0,0,.1);
}

/* ========================================
   GRID DOS INPUTS

   Divide em duas colunas
======================================== */

.form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:15px;
}

/* ========================================
   CAMPOS DE ENTRADA
======================================== */

input,
textarea,
select{
    width:100%;
    padding:12px;
    margin-top:5px;
    margin-bottom:15px;
    border-radius:10px;
    border:1px solid #ccc;
}

/* Configuração específica do textarea */

textarea{
    height:100px;

    /* Impede redimensionamento */
    resize:none;
}

/* ========================================
   BOTÃO CADASTRAR
======================================== */

.botao{
    width:100%;
    padding:15px;
    background:#374151;
    color:white;
    border:none;
    border-radius:10px;

    /* Mãozinha ao passar mouse */
    cursor:pointer;
}

/* ========================================
   LISTA DE TAREFAS

   Cria cards automáticos
======================================== */

.lista{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(320px,1fr));
    gap:20px;
}

/* ========================================
   CARD DA TAREFA
======================================== */

.item{
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 4px 10px rgba(0,0,0,.1);

    /* Impede expansão exagerada */
    min-width:0;
    overflow:hidden;
}

/* ========================================
   TÍTULO DA TAREFA
======================================== */

.item h2{
    margin-bottom:10px;
    color:#1f2937;

    /* Quebra palavras grandes */
    word-break:break-all;
    overflow-wrap:break-word;
}

/* ========================================
   DESCRIÇÃO
======================================== */

.descricao{

    /* Quebra textos contínuos */
    word-break:break-all;

    /* Faz quebra automática */
    overflow-wrap:break-word;

    /* Mantém dentro do card */
    max-width:100%;

    margin-top:10px;
    line-height:1.5;
}

/* ========================================
   INFORMAÇÕES
======================================== */

.info{
    margin-top:10px;
    color:#6b7280;
}

/* ========================================
   PRIORIDADE BAIXA
======================================== */

.baixa{
    background:#16a34a;
    color:white;
    padding:5px 12px;
    border-radius:20px;
    display:inline-block;
    margin-top:15px;
}

/* ========================================
   PRIORIDADE MÉDIA
======================================== */

.media{
    background:#eab308;
    color:white;
    padding:5px 12px;
    border-radius:20px;
    display:inline-block;
    margin-top:15px;
}

/* ========================================
   PRIORIDADE ALTA
======================================== */

.alta{
    background:#dc2626;
    color:white;
    padding:5px 12px;
    border-radius:20px;
    display:inline-block;
    margin-top:15px;
}

/* ========================================
   BOTÃO EXCLUIR
======================================== */

.excluir{
    width:100%;
    padding:10px;
    margin-top:15px;
    background:#374151;
    color:white;
    border:none;
    border-radius:10px;
    cursor:pointer;
}

/* ========================================
   MENSAGEM DE ERRO
======================================== */

.erro{
    background:#fecaca;
    color:#991b1b;
    padding:15px;
    margin-bottom:20px;
    border-radius:10px;
}

</style>

</head>

<body>

<!-- Container principal -->
<div class="container">

    <!-- Título da página -->
    <h1 class="titulo">
        Sistema de Gerenciamento de Tarefas
    </h1>

    <!-- Verifica se existem erros -->
    @if($errors->any())

    <div class="erro">

        <ul>
        <!-- Percorre todos os erros -->
        @foreach($errors->all() as $erro)

            <li>{{$erro}}</li>

        @endforeach
        </ul>
    </div>

    @endif

    <!-- Card do formulário -->
    <div class="card">

        <!-- Formulário enviado para /tarefas -->
        <form method="POST" action="/tarefas">

            <!-- Token de segurança Laravel -->
            @csrf

            <div class="form-grid">

                <div>
                    <label>Título</label>

                    <!-- Campo título -->
                    <input
                    type="text"
                    name="titulo"
                    placeholder="Digite o título"
                    value="{{old('titulo')}}">
                </div>

                <div>
                    <label>Prioridade</label>

                    <select name="prioridade">

                        <option value="">Selecione</option>
                        <option>Baixa</option>
                        <option>Média</option>
                        <option>Alta</option>
                    </select>
                </div>
            </div>

            <label>Descrição</label>

            <!-- Campo descrição -->
            <textarea
            name="descricao"
            placeholder="Digite a descrição">{{old('descricao')}}</textarea>

            <div class="form-grid">
                <div>
                    <label>Data de entrega</label>
                    <input type="date" name="data_entrega">
                </div>

                <div>
                    <label>Categoria</label>
                    <select name="categoria_id">

                        <option value="">
                            Selecione
                        </option>

                        <!-- Percorre categorias -->
                        @foreach($categorias as $categoria)

                        <option value="{{$categoria->id}}">
                            {{$categoria->nome}}
                        </option>

                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Botão cadastrar -->
            <button class="botao">
                Cadastrar tarefa
            </button>
        </form>
    </div>

    <!-- Lista de tarefas -->
    <div class="lista">

        <!-- Percorre todas as tarefas -->
        @foreach($tarefas as $tarefa)

        <div class="item">

            <!-- Título -->
            <h2>{{$tarefa->titulo}}</h2>

            <!-- Descrição -->
            <p class="descricao">
                {{$tarefa->descricao}}
            </p>

            <!-- Data -->
            <div class="info">
                📅 {{$tarefa->data_entrega}}
            </div>

            <!-- Categoria -->
            <div class="info">
                📁 {{$tarefa->categoria->nome}}
            </div>

            <!-- Define a cor da prioridade -->

            @if($tarefa->prioridade=="Baixa")
                <div class="baixa">Baixa</div>
            @endif

            @if($tarefa->prioridade=="Média")
                <div class="media">Média</div>
            @endif

            @if($tarefa->prioridade=="Alta")
                <div class="alta">Alta</div>
            @endif

            <!-- Formulário de exclusão -->
            <form method="POST" action="/tarefas/{{$tarefa->id}}">
                @csrf
                <!-- Altera método para DELETE -->
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