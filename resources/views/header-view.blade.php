@use('Illuminate\Support\Facades\Vite')
 
<!doctype html>
<head>
    <style>
        {!! Vite::content('resources/css/app.css') !!}
    </style>
    <script>
        {!! Vite::content('resources/js/app.js') !!}
    </script>
</head>

<body class="text-sm">

    <div class="text-center text-lg mb-5">
        <strong>RESULTADOS DE EXAMES LABORATORIAIS</strong>
    </div>

    <br>

   <table class="w-full mb-5">
        <tbody>
            <tr>
                <td><strong>Piscicultura: </strong>{{ $piscicultura }}</td>
                <td><strong>Solicitante: </strong>{{ $solicitante }}</td>
                
            </tr>
            <tr>
                <td><strong>Cidade: </strong>{{ $cidade }}  <strong>Estado: </strong>{{ $estado }}</td>
                <td><strong>Data da Coleta: </strong>{{ $data_coleta }}</td>
            </tr>
        </tbody>
    </table>

    <div class="mb-5">
        <strong>Material enviado:</strong> 
        {{ $qtd_peixe }} peixe(s) {{ $refrigeracao }}(s) da espécie <i>{{ $especie }}</i>
    </div>

    <div class="text-center mb-5">
        <strong>METODOLOGIA</strong>
    </div>

    <p>
        Os animais enviado(s) receberam numeração de registro da PREVET: 
        <strong>{{ $lote }}</strong> - Lote: "{{ $id_lote }}". Para as provas bacteriológicas, 
        alíquotas contendo fragmentos de {{ $lista_fragmentos }}
        foram semeados em {{ $lista_meiodecultura }}.
    </p>
    <p>
        Posteriormente ao crescimento bacteriano, foi realizado: 
        reação de PCR, sequenciamento genético para determinação da 
        espécie do microrganismo isolado e ainda, testes de
        antibiograma para os principais antibióticos de mercado.
    </p>

    <div class="text-center mb-5">
        <strong>RESULTADOS</strong>
    </div>

    <div class="mb-2">
        <strong>1- Achados de Necropsia</strong>
    </div>

    <div class="mb-5">
        Peso médio do lote: <strong> {{ $peso }} g</strong>
    </div>

    <p class="mb-5">
        {!! $necropsia !!}
    </p>

    <div class="mb-2">
        <strong>2- Microbiologia</strong>
    </div>

    <table class="w-full">
        <thead>
          <tr>
            <th class="text-center">Lote/ano/n</th>
            <th class="text-center">Fragmento</th>
            <th class="text-center">Placa</th>
            <th class="text-center">Crescimento em Placa</th>
            <th class="text-center">Morfologia</th>
          </tr>
        </thead>
        <tbody>
          
            @foreach ($morfologia as $item)
            <tr>
                <td class="text-center">{{ $item->IDPeixe }}</td>
                <td class="text-center">{{ $item->IDFraguimentos }}</td>
                <td class="text-center">{{ $item->IDMeioCultura }}</td>
                <td class="text-center">{{ $item->resultado }}</td>
                <td class="text-center">{{ $item->morfologia }}</td>
            </tr>
            @endforeach
            
          
        </tbody>
      </table>

    <div class="mb-5">
        Das placas que apresentam crescimento de colónias 
        (- ver Tabela 1 e datalhamento das placas e dos meios de 
        cultura na metodologia) algumas foram selecionadas para os
        antibiogramas(Tabela 2).
    </div>

    <div class="mb-2">
        <strong>2.1- Antibiograma</strong>
    </div>

    <table class="w-full">
        <thead>
          <tr>
            <th class="text-center">Amostra</th>
            <th class="text-center">Oxitetraciclina</th>
            <th class="text-center">Florfenicol</th>
            <th class="text-center">Amoxicilina</th>
            <th class="text-center">Norfloxacina</th>
            <th class="text-center">Enrofloxacina</th>
            <th class="text-center">ID Molecular</th>
          </tr>
        </thead>
        <tbody>
          
            @foreach ($antibiograma as $item)
            <tr>
                <td class="text-center">{{ $item['peixe'] }}</td>
                <td class="text-center">{{ $item['oxi'] }}</td>
                <td class="text-center">{{ $item['flo'] }}</td>
                <td class="text-center">{{ $item['amo'] }}</td>
                <td class="text-center">{{ $item['nor'] }}</td>
                <td class="text-center">{{ $item['enr'] }}</td>
                <td class="text-center">{{ $item['bacteria'] }}</td>
            </tr>
            @endforeach
            
        </tbody>
      </table>
      <p>*ANTIBIÓTICOS LEGALIZADOS NO BRASIL: OXITETRACICLINA E FLORFENICOL</p>

</body>