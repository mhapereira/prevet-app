<?php

namespace App\Http\Controllers;

use App\Models\Piscicultura;
use App\Models\RegistroAmostra;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class DownloadPdfController extends Controller
{
    public function microbiologico_pdf($registro) {

        $R = RegistroAmostra::find($registro);
        $R->IDPsicultura =  $R->piscicultura->Nome;

        $piscicultura = $R->piscicultura->Nome;
        $cidade = $R->piscicultura->cidade->Nome_Cidade;
        $estado = $R->piscicultura->cidade->estado->UF;
        $solicitante = $R->piscicultura->usuario->name;
        $data_coleta = $R->Data_coleta;
        $qtd_peixe = $R->Quantidade;
        $refrigeracao = $R->Refrigeracao;
        $especie = $R->Especie;
        $lote = $R->lote;
        $id_lote = $R->tank;

        $lista_fragmentos = 'Brânquias, Cérebro, Rim';
        $lista_meiodecultura = 'BHI, BHI Sangue, Meio F';
        $peso = $R->peso;
        $necropsia = $R->Descricao;
        
        if ($R->necropsia)
        {
            $arr = [];

            foreach ($R->necropsia as $key => $value)
            {
                if($value['Incidencia'] <> null)
                {
                    array_push($arr, $value['nome'] . ' ' . $value['Incidencia'] . '<br>');

                }
            }

            $text_necropsia = implode(" ",$arr);

            $necropsia = $text_necropsia;

        }

        $antibiograma = [];

        foreach ($R->amostras as $key => $value) {

            $value->IDMeioCultura = $value->meiocultura->Descricao;
            $value->IDFraguimentos = $value->fragmento->Descricao;
            
            if ($value->antibiograma) {
                
                $arr = [
                    'peixe' => $value->IDPeixe,
                    'bacteria' => '',
                    'oxi' => '',
                    'flo' => '',
                    'amo' => '',
                    'nor' => '',
                    'enr' => '',
                ];

                foreach ($value->antibiograma as $key => $value) {
                    
                    switch ($value->IDAntibioticos) {
                        case 1:
                            $arr['oxi'] = $value->Resultados;
                            $arr['bacteria'] = $value->ID_Molecular;
                            break;
                        case 2:
                            $arr['flo'] = $value->Resultados;
                            break;
                        case 3:
                            $arr['amo'] = $value->Resultados;
                            break;
                        case 4:
                            $arr['nor'] = $value->Resultados;
                            break;
                        case 5:
                            $arr['enr'] = $value->Resultados;
                            break;
                        
                        default:
                            # code...
                            break;
                    }

                }

                if($arr['bacteria'])
                    array_push($antibiograma, $arr);
            }

            

        }

        $morfologia = $R->amostras;

        


        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $options->setChroot("/public");
        $dompdf = new Dompdf($options);

        $html = view('header-view', compact(
            'piscicultura',
            'cidade',
            'estado',
            'solicitante',
            'data_coleta',
            'qtd_peixe',
            'refrigeracao',
            'especie',
            'lote',
            'id_lote',
            'lista_fragmentos',
            'lista_meiodecultura',
            'peso',
            'necropsia',
            'morfologia',
            'antibiograma',
        ))->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();


        return $dompdf->stream('document.pdf', ["Attachment" => false]);
    }
}
