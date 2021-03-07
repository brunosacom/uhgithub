<?php require $_SERVER['DOCUMENT_ROOT'].'/php/mysqli_connect.php'; ?> <!-- MySqlDB connect brunosacom -->

<?php

// URL EXEMPLO
//https://www.bruno-sa.com/bembos/festivalinscricao/index.php?emp_sigla='BMB'

$emp_sigla = $_GET['emp_sigla'];

$today = date('Y-m-d');


$sql_empresa = "SELECT * FROM bembos_empresa WHERE empresa_sigla = $emp_sigla";
$result_empresa = mysqli_query($con, $sql_empresa);
while ($row_empresa = mysqli_fetch_array($result_empresa)) {
  $empresa_logo = $row_empresa['empresa_logo'];
  $empresa_favicon = $row_empresa['empresa_favicon'];
  $empresa_nome = $row_empresa['empresa_nome'];
  $empresa_sigla = $row_empresa['empresa_sigla'];
  $empresa_whatsapp = $row_empresa['empresa_whatsapp'];
  $empresa_emailto = $row_empresa['empresa_emailto'];
  $empresa_emailtonome = $row_empresa['empresa_emailtonome'];
  $empresa_smtp = $row_empresa['empresa_smtp'];
  $empresa_username = $row_empresa['empresa_username'];
  $empresa_password = $row_empresa['empresa_password'];
  $empresa_emailfrom = $row_empresa['empresa_emailfrom'];
  $empresa_emailfromnome = $row_empresa['empresa_emailfromnome'];
}
?>

<!DOCTYPE HTML>
<html lang="pt-br">
  <head>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/analyticstracking.php' ?> <!-- Google Analytics Track brunosacom -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscrição Festival de Cinema</title>
    <link rel="shortcut icon" href="<?php echo $empresa_favicon; ?>">
    <link href="https://fonts.googleapis.com/css?family=Didact Gothic" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  </head>

  <body style="font-family: Didact Gothic;">
    <div class="container">
    	<!-- Content here -->
      <div class="row justify-content-md-center">
        <div class="col"></div>
        <div class="col"><img src="<?php echo $empresa_logo; ?>" class="custom-logo" alt="<?php echo $empresa_nome; ?>" width="200"></div>
        <div class="col"></div>
      </div>
			<h1>Formulário de Inscrição</h1>
      <form action="../../php/enviarauthinsertcheck_action.php" method="post" name="festrio_inscricao" class="txt_corrido" id="festrio_inscricao" onsubmit="return formvalidation(this)">
        <p>FICHA DE INSCRIÇÃO PREMIÈRE BRASIL</p>
        <input name="inscricao_charset" type="hidden" id="inscricao_charset" value="utf-8">
        <input name="inscricao" type="hidden"  value="pbrasil">
        <p class="form_required">Em vermelho os campos obrigatórios</p>
        <table width="80%"  border="3" cellpadding="0" cellspacing="0" bordercolor="#cccccc">
          <tr bgcolor="#cccccc">
            <td width="50%">1 - FILME</td>
            <td width="50%">&nbsp;</td>
          </tr>
          <tr class="form_required">
            <td>1.01 - Título Original</td>
            <td>
              <input name="titulo_original" type="text" id="titulo_original" size="50" maxlength="100" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>1.02 - Título Inglês</td>
            <td>
              <input name="titulo_ingles" type="text" id="titulo_ingles"  size="50" maxlength="100" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>1.03 - Direção</td>
            <td>
              <input name="diretor" type="text" id="diretor"  size="50" maxlength="100" required>
            </td>
          </tr>
          <tr>
            <td><p>1.04 - País de produção</p>
            <p class="resumo_regulamento">REGULAMENTO ITEM:<br>
            Para fins deste regulamento, considera-se filme brasileiro todo aquele que tenha Certificado de Produto Brasileiro, registrado junto à Agência Nacional do Cinema (Ancine), ou, aquele que em caso de ser objeto de co-produção internacional, a empresa produtora majorit&aacute;ria seja brasileira.</p></td>
            <td><input name="pais1_alpha3" type="hidden" id="pais1_alpha3"  value="BRA">
              Brasil </td>
          </tr>
          <tr>
            <td>1.05 - Países de Co-Produção</td>
            <td><select name="pais2_alpha3" id="pais2_alpha3">
                <option value="" selected="selected">selecione</option>
                <?php include '../../../../php/mysql2form/option_pais_ptbr.php'; ?> <!-- DB paises e codigos em QBP -->
                </select>
              <br>
              <select name="pais3_alpha3" id="pais3_alpha3">
                <option value="" selected="selected">selecione</option>
                <?php include '../../../../php/mysql2form/option_pais_ptbr.php'; ?> <!-- DB paises e codigos em QBP -->
                </select>
              <br>
              <select name="pais4_alpha3" id="pais4_alpha3">
                <option value="" selected="selected">selecione</option>
                <?php include '../../../../php/mysql2form/option_pais_ptbr.php'; ?> <!-- DB paises e codigos em QBP -->
                </select>
              <br>
              <select name="pais5_alpha3" id="pais5_alpha3">
                <option value="" selected="selected">selecione</option>
                <?php include '../../../../php/mysql2form/option_pais_ptbr.php'; ?> <!-- DB paises e codigos em QBP -->
                </select></td>
          </tr>
          <tr class="form_required">
            <td>1.06 - Ano</td>
            <td><select name="ano" required>
                <option value=""selected="selected">Selecione</option>
                <!-- Calculo para ano atual e anterior -->
                <option value="<?php echo date("Y"); ?>"><?php echo date("Y"); ?></option>
                <option value="<?php $y=strtotime("-1 year");
                              echo date("Y", $y) ?>">
                  <?php $y=strtotime("-1 year");
                              echo date("Y", $y) ?></option>
              </select>
              (aaaa) </td>
          </tr>
          <tr class="form_required">
            <td>1.07 - Duração </td>
            <td><input name="duracao" type="number" id="duracao"  size="3" max="999" required>
              min</td>
          </tr>
          <tr>
            <td>1.08 - Website do filme </td>
            <td><input name="filme_website" type="text" size="50" maxlength="100"></td>
          </tr>
          <tr>
            <td>1.09 - Festivais e Prêmios <br>
              (limitado a 500 caracteres com espaço) </td>
            <td><textarea name="premios" cols="50" rows="5" ></textarea></td>
          </tr>
          <tr class="form_required">
            <td>1.10 - Categoria 
              <p class="resumo_regulamento">REGULAMENTO ITEM:<br></p>
              <p class="resumo_regulamento"><strong>DAS CONDIÇÕES DE PARTICIPAÇÃO NA MOSTRA COMPETITIVA PRINCIPAL DA PREMIÈRE BRASIL 2019:</strong></p>
              <p class="resumo_regulamento">Para participarem da <strong>Mostra Competitiva Principal da Première Brasil </strong>e estarem aptos a concorrer aos prêmios, os filmes deverão atender às seguintes condições:<br>
                <strong>Filmes Longas-Metragens de Ficção</strong></p>
              <ol>
                <li class="resumo_regulamento">não terem sido recusados em edições anteriores do&nbsp;<strong>Festival do Rio</strong>;</li>
                <li class="resumo_regulamento">terem duração superior a 70 minutos;</li>
                <li class="resumo_regulamento">serem inéditos no Rio de Janeiro e não explorados comercialmente por qualquer mídia em todo território brasileiro;</li>
                <li class="resumo_regulamento">apresentarem cópia para o processo de seleção (preferencialmente legendada em inglês) <strong>EXCLUSIVAMENTE por meio de sites de compartilhamento de vídeo em streaming</strong>. Cópias enviadas em DVD e por meio de serviços de download <strong>não</strong> serão aceitas.</li>
                <li class="resumo_regulamento">se selecionados, apresentarem cópia final em <strong>DCP aberto</strong>;</li>
                <li class="resumo_regulamento">filmes falados em outro idioma que não o português devem - obrigatoriamente - entregar cópia legendada em português para exibição.</li>
              </ol>
              <p class="resumo_regulamento"><strong>Filmes Longas-Metragens Documentários</strong></p>
              <ol>
                <li class="resumo_regulamento">não terem sido recusados em edições anteriores do <strong>Festival do Rio</strong>;</li>
                <li class="resumo_regulamento">terem duração superior a 70 minutos;</li>
                <li class="resumo_regulamento">serem inéditos no Rio de Janeiro e não explorados comercialmente por qualquer mídia em todo território brasileiro;</li>
                <li class="resumo_regulamento">apresentarem cópia para o processo de seleção (preferencialmente legendada em inglês) <strong>EXCLUSIVAMENTE por meio de sites de compartilhamento de vídeo em streaming</strong>. Cópias enviadas em DVD e por meio de serviços de download <strong>não</strong> serão aceitas.</li>
                <li class="resumo_regulamento">caso selecionados, apresentarem cópia final em <strong>DCP aberto</strong>;</li>
                <li class="resumo_regulamento">filmes falados em outro idioma que não o português, devem - obrigatoriamente - entregar cópia legendada em português para exibição.</li>
              </ol>
              <p class="resumo_regulamento"><strong>Filmes Curtas-Metragens</strong></p>
              <ol>
                <li class="resumo_regulamento">não terem sido inscritos em edições anteriores do <strong>Festival do Rio</strong>;</li>
                <li class="resumo_regulamento">terem sido finalizados em 2019 ou 2018;</li>
                <li class="resumo_regulamento">não terem sido explorados comercialmente por qualquer mídia em todo território brasileiro;</li>
                <li class="resumo_regulamento">terem duração de no máximo 15 minutos;</li>
                <li class="resumo_regulamento">apresentarem cópia para o processo de seleção (preferencialmente legendada em inglês) <strong>EXCLUSIVAMENTE por meio de sites de compartilhamento de vídeo em streaming</strong>. Cópias enviadas em DVD e por meio de serviços de download <strong>não</strong> serão aceitas.</li>
                <li class="resumo_regulamento">caso selecionados, apresentarem cópia final em <strong>DCP aberto</strong>;</li>
                <li class="resumo_regulamento">filmes falados em outro idioma que não o português, devem - obrigatoriamente - entregar cópia legendada em português para exibição.</li>
              </ol>
              <p class="resumo_regulamento"><strong>DAS CONDIÇÕES DE PARTICIPAÇÃO DE FILMES PARA MOSTRAS ESPECIAIS NÃO COMPETITIVAS E MOSTRA COMPETITIVA NOVOS RUMOS</strong>:<br>
                <br>
                a) terem duração superior a 60 minutos para longas-metragens;<br>
                b) terem duração inferior a 30 minutos para curtas-metragens;<br>
                c) não terem sido explorados comercialmente por qualquer mídia em todo território brasileiro;<br>
                d) terem sido finalizados em 2020 ou 2019;<br>
                e) apresentarem cópia para o processo de seleção (preferencialmente legendada em inglês) <strong>EXCLUSIVAMENTE por meio de sites de compartilhamento de vídeo em streaming</strong>. Cópias enviadas em DVD e por meio de serviços de download <strong>não</strong> serão aceitas.<br>
                f) caso selecionados, apresentarem cópia final em DCP aberto;<br>
                g) filmes falados em outro idioma que não o português, devem - obrigatoriamente - entregar cópia legendada em português para exibição.</p>
            </td>
            <td>
            <input name="categoria" type="radio" value="pb lg70 - fic" required>Longa-Metragem (acima de 70 min.) - Ficção<br>
            <input name="categoria" type="radio" value="pb lg70 - doc"  required>Longa-Metragem (acima de 70 min.) - Documentário<br>
            <input name="categoria" type="radio" value="pb lg60 - fic"  required>Longa-Metragem (entre 60 e 70 min.) - Ficção<br>
            <input name="categoria" type="radio" value="pb lg60 - doc" required>Longa-Metragem (entre 60 e 70 min.) - Documentário<br>
            <input name="categoria" type="radio" value="pb ct15 - fic" required>Curta-Metragem (at&eacute; 15 min.) - Ficção<br>
            <input name="categoria" type="radio" value="pb ct15 - doc" required>Curta-Metragem (at&eacute; 15 min.) - Documentário <br>
            <input name="categoria" type="radio" value="pb ct30 - fic"  required>Curta-Metragem (entre 15 e 30 min.) - Ficção<br>
            <input name="categoria" type="radio" value="pb ct30 - doc"  required>Curta-Metragem (entre 15 e 30 min.) - Documentário<br>
            </td>
          </tr>
          <tr class="form_required">
            <td>1.11 - Classificação Indicativa</td>
            <td><p>
              <input name="classificacao" type="radio" value="ER" required>Especialmente Recomendado<br>
              <input name="classificacao" type="radio" value="L" required>Livre<br>
              <input name="classificacao" type="radio" value="10" required>10 anos<br>
              <input name="classificacao" type="radio" value="12" required>12 anos<br>
              <input name="classificacao" type="radio" value="14" required> 14 anos<br>
              <input name="classificacao" type="radio" value="16" required>16 anos<br>
              <input name="classificacao" type="radio" value="18" required>18 anos</p>
            </td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <table width="80%"  border="3" cellpadding="0" cellspacing="0" bordercolor="#cccccc">
          <tr bgcolor="#cccccc">
            <td width="50%">2 - INFORMAÇÃO TÉCNICA </td>
            <td width="50%">&nbsp;</td>
          </tr>
          <tr class="form_required">
            <td><p>2.01 - Bitola de exibição final</p>
              <p class="resumo_regulamento">REGULAMENTO ITEM:</p>
              <p class="resumo_regulamento"><strong>DAS CÓPIAS DE EXIBIÇÃO:</strong></p>
              <p class="resumo_regulamento">Todas as cópias de exibição deverão ser entregues na sede do <strong>Festival do Rio </strong>já tendo sido revisadas integralmente, ao menos uma vez, pela produção do filme.</p>
              <p class="resumo_regulamento"> Filmes selecionados que apresentarem cópia final em DCP aberto, devem entregá-la em perfeito estado até o dia<strong> 27 de setembro</strong>. <strong>Não serão aceitas cópias fechadas para as mostras competitivas da Première Brasil. </strong></p>
            </td>
            <td bordercolor="#CCCCCC"><span class="form_required">
              <input name="bitola_inscricao" type="radio" value="DCP-aberto" required>DCP aberto <br>
              <input name="bitola_inscricao" type="radio" value="DCP-3Daberto" required>DCP-3D aberto <br>
              <input name="bitola_inscricao" type="radio" value="DCP-encriptado" required>DCP encriptado <br>
              <input name="bitola_inscricao" type="radio" value="DCP-3Dencriptado" required>DCP-3D encriptado <br>
              <input name="bitola_inscricao" type="radio" value="DCP-+chave" required>DCP + chave <br>
              <input name="bitola_inscricao" type="radio" value="DCP-3D+chave" required>DCP-3D + chave <br>
              <input name="bitola_inscricao" type="radio" value="DCP naodefinido" required>DCP n&atilde;o definido </span></td>
          </tr>
          <tr class="form_required">
            <td>2.02 - Definição Digital de exibição final</td>
            <td>
              <input name="definicaodigital" type="radio" value="4K" required>4K (4096x2160)<br>
              <input name="definicaodigital" type="radio" value="2K" required>2K (2048x1080)<br>
              <input name="definicaodigital" type="radio" value="FullHD" required>FullHD (1920x1080)<br>
              <input name="definicaodigital" type="radio" value="HD" required>HD (1280x720)<br>
              <input name="definicaodigital" type="radio" value="SD" required>SD (720x480)</td>
          </tr>
          <tr class="form_required">
            <td>2.03 - Janela de exibição final</td>
            <td>
              <input name="janela" type="radio" value="1.78 (scopeinflat)" required>1.78 (Digital HD - Scope dentro do Flat/16:9)<br>
              <input name="janela" type="radio" value="2.39 (DCP_scope)" required>2.39 (DCP scope)<br>
              <input name="janela" type="radio" value="1.85 (DCP_flat)" required>1.85 (DCP flat)<br>
              <input name="janela" type="radio" value="1.90 (DCP_full)" required>1.90 (DCP full)<br>
              <input name="janela" type="radio" value="1.33 (35_planoantigo)" required>1.33 (35mm antigo)<br>
              <input name="janela" type="radio" value="1.66 (35_plano)" required>1.66 (35mm)<br>
              <input name="janela" type="radio" value="1.85 (35_panoramico)" required>1.85 (35mm)<br>
              <input name="janela" type="radio" value="2.35 (35_scope)" required>2.35 (35mm scope)<br>
              <input name="janela" type="radio" value="1.33 (DIG_sd - 4:3)" required>1.33 (Digital SD - 4:3)<br>
              <input name="janela" type="radio" value="1.78 (DIG_hd - 16:9)" required>1.78 (Digital HD - 16:9)<br>
            </td>
          </tr>
          <tr class="form_required">
            <td>2.04 - Cor  de exibição final</td>
            <td>
              <input name="cor" type="radio" value="Cor" required>Cor<br>
              <input name="cor" type="radio" value="P&B" required>P&B <br>
              <input name="cor" type="radio" value="Cor e P&B" required>Cor / P&B </td>
          </tr>
          <tr class="form_required">
            <td>2.05 - Som  de exibição final</td>
            <td>
              <input name="som" type="radio" value="Dolby Atmos" required>Dolby Atmos<br>
              <input name="som" type="radio" value="Barco Auro3D 11.1" required>Barco Auro3D 11.1<br>
              <input name="som" type="radio" value="Dolby Digital EX 7.1" required>Dolby Digital EX 7.1<br>
              <input name="som" type="radio" value="Dolby Digital EX 6.1" required>Dolby Digital EX 6.1<br>
              <input name="som" type="radio" value="Digital 5.1" required>Digital 5.1<br>
              <input name="som" type="radio" value="Digital 5.0" required>Digital 5.0 <br>
              <input name="som" type="radio" value="Dolby SR 5.1" required>Dolby SR 5.1<br>
              <input name="som" type="radio" value="Stereo 2.0" required>Stereo 2.0 <br>
              <input name="som" type="radio" value="Mono 1.0" required>Mono 1.0<br>
              <input name="som" type="radio" value="Mudo" required>Mudo
            </td>
          </tr>
          <tr class="form_required">
            <td>2.06 - Idioma  de exibição final</td>
            <td>
              <select name="idioma1_dci" id="idioma1_dci" size="1" required>
                <option value="" selected="selected">selecione</option>
                <?php include '../../../../php/mysql2form/option_idioma_natdci.php'; ?> <!-- DB idioma e codigos nativo -->
                </select>
            mais de um idioma? <br>
            especifique todos
            <input name="idioma2" id="idioma2" type="text" size="30" maxlength="100">
            </td>
          </tr>
          <tr class="form_required">
            <td>2.07 - Idioma da legenda na cópia de exibição</td>
            <td>
              <select name="leg_copia_dci" id="leg_copia_dci" required>
                <option value="" selected="selected">selecione</option>
              <?php include '../../../../php/mysql2form/option_idioma_natdci.php'; ?> <!-- DB idioma e codigos nativo -->
                </select>
            </td>
          </tr>
          <tr class="form_required">
            <td>2.08 - Idioma da legenda na cópia de seleção</td>
            <td>
              <select name="leg_copiaselecao_dci" id="leg_copiaselecao_dci" required>
                <option value="" selected="selected">selecione</option>
                <?php include '../../../../php/mysql2form/option_idioma_natdci.php'; ?> <!-- DB idioma e codigos nativo -->
                </select>
            </td>
          </tr>
          <tr>
            <td>2.09 - Acessibilidade</span></td>
            <td>
              <input name="acessibilidade_ad" type="checkbox" value="AD">audio descrição| 
              <input name="acessibilidade_ccap" type="checkbox" value="CCAP">leg. descritiva | 
              <input name="acessibilidade_libras" type="checkbox" value="LIBRAS">libras 
            </td>
          </tr>
          <tr class="form_required">
            <td>2.10 - Cópia para Seleção</td>
            <td>
              <input name="copia_selecao" type="radio"  required value="link" checked>link - url? 
              <input name="link_selecao" type="text" id="link_selecao" size="30" maxlength="100">
              <br>password
              <input name="link_password" type="text" id="link_password" size="30" maxlength="100">
              </td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <table width="80%"  border="3" cellpadding="5" cellspacing="0" bordercolor="#cccccc">
          <tr bgcolor="#cccccc">
            <td width="50%">3 - CONTATOS</td>
            <td width="50%">&nbsp;</td>
          </tr>
          <tr bordercolor="#FFCC00" bgcolor="#FFCC00">
            <td>3.1 - Contato Distribuidora</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>3.1.01 - Empresa Distribuidora </td>
            <td><input name="distribuidora_empresa" type="text"  size="50" maxlength="100"></td>
          </tr>
          <tr>
            <td>3.1.02 - Nome do Contato </td>
            <td><input name="distribuidora_contatonome" type="text"  size="50" maxlength="100"></td>
          </tr>
          <tr>
            <td>3.1.03 - Telefone </td>
            <td><input name="distribuidora_telefone" type="text"  size="20"></td>
          </tr>
          <tr>
            <td>3.1.04 - Celular </td>
            <td><input name="distribuidora_celular" type="text"  size="20"></td>
          </tr>
          <tr>
            <td>3.1.05 - Fax </td>
            <td><input name="distribuidora_fax" type="text"  size="20"></td>
          </tr>
          <tr>
            <td>3.1.06 - Email </td>
            <td><input name="distribuidora_email" type="text" id="distribuidora_email"></td>
          </tr>
          <tr class="form_required">
            <td>3.2.07 - CEP</td>
            <td>
              <input name="distribuidora_cep" id="distribuidora_cep" type="text"  size="20" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>3.2.08 - Logradouro</td>
            <td>
              <input name="distribuidora_logradouro" id="distribuidora_logradouro" type="text"  value="" size="50" maxlength="200" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>3.2.08 - Número</td>
            <td>
              <input name="distribuidora_numero" id="distribuidora_numero" type="text"  value="" size="50" maxlength="200" required>
            </td>
          </tr>
          <tr>
            <td>3.2.08 - Complemento</td>
            <td><input name="distribuidora_complemento" id="distribuidora_complemento" type="text"  value="" size="50" maxlength="200"></td>
          </tr>
          <tr class="form_required">
            <td>3.2.08 - Bairro</td>
            <td>
              <input name="distribuidora_bairro" id="distribuidora_bairro" type="text"  value="" size="50" maxlength="200" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>3.2.08 - Cidade</td>
            <td>
              <input name="distribuidora_cidade" id="distribuidora_cidade" type="text"  value="" size="50" maxlength="200" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>3.2.08 - UF</td>
            <td>
              <input name="distribuidora_uf" id="distribuidora_uf" type="text"  value="" size="50" maxlength="200" required>
            </td>
          </tr>
          <tr>
            <td>3.1.08 - Website</td>
            <td><input name="distribuidora_website" type="text"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr bordercolor="#FFCC00" bgcolor="#FFCC00">
            <td>3.2 - Contato Produtora </td>
            <td>&nbsp;</td>
          </tr>
          <tr class="form_required">
            <td>3.2.01 - Empresa Produtora</td>
            <td>
              <input name="produtora_empresa" type="text" id="produtora_empresa"  size="50" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>3.2.02 - Nome do Contato</td>
            <td>
              <input name="produtora_contatonome" type="text" id="produtora_contatonome"  size="30" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>3.2.03 - Telefone</td>
            <td>
              <input name="produtora_telefone" type="text" id="produtora_telefone"  size="20" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>3.1.04 - Celular</td>
            <td><input name="produtora_celular" type="text"  size="20" required></td>
          </tr>
          <tr>
            <td>3.2.05 - Fax </td>
            <td><input name="produtora_fax" type="text" size="20"></td>
          </tr>
          <tr class="form_required">
            <td>3.2.06 - Email</td>
            <td>
              <input name="produtora_email" type="email" id="produtora_email" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>3.2.07 - CEP</td>
            <td>
              <input name="produtora_cep" id="produtora_cep" type="text"  size="20" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>3.2.08 - Logradouro</td>
            <td>
              <input name="produtora_logradouro" id="produtora_logradouro" type="text"  value="" size="50" maxlength="200" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>3.2.08 - Número</td>
            <td>
              <input name="produtora_numero" id="produtora_numero" type="text"  value="" size="50" maxlength="200" required>
            </td>
          </tr>
          <tr>
            <td>3.2.08 - Complemento </td>
            <td><input name="produtora_complemento" id="produtora_complemento" type="text"  value="" size="50" maxlength="200"></td>
          </tr>
          <tr class="form_required">
            <td>3.2.08 - Bairro</td>
            <td>
              <input name="produtora_bairro" id="produtora_bairro" type="text"  value="" size="50" maxlength="200" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>3.2.08 - Cidade</td>
            <td>
              <input name="produtora_cidade" id="produtora_cidade" type="text"  value="" size="50" maxlength="200" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>3.2.08 - UF</td>
            <td>
              <input name="produtora_uf" id="produtora_uf" type="text"  value="" size="50" maxlength="200" required>
            </td>
          </tr>
          <tr>
            <td>3.2.09 - Website </td>
            <td><input name="produtora_website" type="text" size="50" maxlength="100"></td>
          </tr>
          <tr>
            <td>3.2.10 - Currículo da empresa produtora (limitado a 500 caracteres com espaço) </td>
            <td><textarea name="produtora_curriculo" cols="50" rows="5" ></textarea></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr bordercolor="#FFCC00" bgcolor="#FFCC00">
            <td>3.3 - Contato Direção</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>3.3.01 - Telefone Direto </td>
            <td><input name="diretor_telefone" type="text"  size="20"></td>
          </tr>
          <tr>
            <td>3.1.03 - Celular Direto</td>
            <td><input name="diretor_celular" type="text"  size="20"></td>
          </tr>
          <tr>
            <td>3.3.02 - Fax Direto </td>
            <td><input name="diretor_fax" type="text"  size="20"></td>
          </tr>
          <tr class="form_required">
            <td>3.3.03 - Email </td>
            <td><input name="diretor_email" type="email" id="diretor_email" required></td>
          </tr>
          <tr>
            <td>3.3.04 - Website </td>
            <td><input name="diretor_website" type="text" size="50" maxlength="100"></td>
          </tr>
          <tr>
            <td>3.3.05 - Estará disponível para entrevistas por telefone ou email? </td>
            <td><input name="diretor_disponivel" type="radio" value="sim">
              Sim <br>
              <input name="diretor_disponivel" type="radio" value="não">
              Não</td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <table width="80%"  border="3" cellpadding="0" cellspacing="0" bordercolor="#cccccc">
          <tr bgcolor="#cccccc">
            <td width="50%">4 - CRÉDITOS</td>
            <td width="50%">&nbsp;</td>
          </tr>
          <tr class="form_required">
            <td>4.01 - Roteiro</td>
            <td>
              <input name="roteiro" type="text" id="roteiro" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>4.03 - Empresa Co-Produtora <br>
            (caso o filme não tenha empresas co-produtoras colocar: NÃO HÁ)</td>
            <td>
              <input name="coproducao" type="text" id="coproducao" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>4.04 - Produção <br>
            (pessoa física responsável pelo filme)</td>
            <td>
              <input name="producao" type="text" id="producao" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>4.05 - Fotografia</td>
            <td>
              <input name="fotografia" type="text" id="fotografia" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>4.06 - Montagem</td>
            <td>
              <input name="montagem" type="text" id="montagem" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>4.07 - Direção de Arte<br>
            (caso o filme não tenha empresas co-produtoras colocar: NÃO HÁ)</td>
            <td>
              <input name="arte" type="text" id="arte" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>4.08 - Edição de Som</td>
            <td>
              <input name="somedicao" type="text" id="somedicao" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>4.09 - Música</td>
            <td>
              <input name="musica" type="text" id="musica" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>4.10 - Figurino<br>
            (caso o filme não tenha trabalho de figurino colocar: NÃO HÁ)</td>
            <td>
              <input name="figurino" type="text" id="figurino" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>4.11 - Elenco (máximo de 5 atores) (caso documentário, preencha "documentário")</td>
            <td>
              <textarea name="elenco" cols="50" rows="5" id="elenco" required></textarea>
            </td>
          </tr>
          <tr class="form_required">
            <td>4.12 - Sinopse (limitado a 580 [longa] ou 210 [curta] caracteres com espaços)</td>
            <td>
              <textarea name="sinopse_br" cols="50" rows="5" id="sinopse_br" maxlength="580" required></textarea>
            </td>
          </tr>
          <tr class="form_required">
            <td>4.13 - Direção Biografia (limitado a 430 [longa] ou 180 [curta] caracteres com espaços)</td>
            <td>
              <textarea name="diretor_biografia_br" cols="50" rows="5" id="diretor_biografia_br" maxlength="430" required></textarea>
            </td>
          </tr>
          <tr class="form_required">
            <td>4.14 - Filmografia (limitado a 500 caracteres com espaços)</td>
            <td>
              <textarea name="diretor_filmografia" cols="50" rows="5" id="diretor_filmografia" maxlength="500" required></textarea>
            </td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <table width="80%"  border="3" cellpadding="0" cellspacing="0" bordercolor="#cccccc">
          <tr bgcolor="#cccccc">
            <td width="50%">5 - TRÁFEGO DE CÓPIAS</td>
            <td width="50%">&nbsp;</td>
          </tr>
          <tr bordercolor="#FFCC00" bgcolor="#FFCC00">
            <td>5.2 - Devolução da cópia</td>
            <td>&nbsp;</td>
          </tr>
              <tr class="form_required">
                <td>5.2.01 - Contato</td>
                <td>
                  <input name="destino_contato" type="text"  size="30" required>
                </td>
            </tr>
          <tr class="form_required">
            <td>5.2.02 - CEP</td>
            <td>
              <input name="destino_cep" id="destino_cep" type="text"  size="20" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>5.2.03 - Logradouro</td>
            <td>
              <input name="destino_logradouro" id="destino_logradouro" type="text"  value="" size="50" maxlength="200" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>5.2.03 - Número</td>
            <td>
              <input name="destino_numero" id="destino_numero" type="text"  value="" size="50" maxlength="200" required>
            </td>
          </tr>
          <tr>
            <td>5.2.03 - Complemento </td>
            <td>
          <input name="destino_complemento" id="destino_complemento" type="text"  value="" size="50" maxlength="200"></td></tr>
          <tr class="form_required">
            <td>5.2.03 - Bairro</td>
            <td>
              <input name="destino_bairro" id="destino_bairro" type="text"  value="" size="50" maxlength="200" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>5.2.03 - Cidade</td>
            <td>
              <input name="destino_cidade" id="destino_cidade" type="text"  value="" size="50" maxlength="200" required>
            </td>
          </tr>
          <tr>
            <td>5.2.03 - UF</td>
            <td>
              <input name="destino_uf" id="destino_uf" type="text"  value="" size="50" maxlength="200" required>
            </td>
          </tr>
          <tr class="form_required">
            <td>5.2.04 - Telefone</td>
            <td>
              <input name="destino_telefone" type="text"  size="20" required>
            </td>
          </tr>
          <tr>
            <td>5.2.05 - Celular</td>
            <td><input name="destino_celular" type="text"  size="20"></td>
          </tr>
          <tr>
            <td>5.2.06 - Fax </td>
            <td><input name="destino_fax" type="text"  size="20"></td>
          </tr>
          <tr class="form_required">
            <td>5.2.07 - Email </td>
            <td><input name="destino_email" type="email" required></td>
          </tr>
          <tr>
            <td>5.2.08 - Observações específicas </td>
            <td><textarea name="destino_shippinginstruction" cols="50" rows="5" ></textarea></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <table width="80%"  border="3" cellpadding="0" cellspacing="0" bordercolor="#cccccc">
          <tr bgcolor="#cccccc">
            <td width="50%">6 - OBSERVAÇÕES </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="50%">6.1 - Observações </td>
            <td width="50%"><textarea name="observacoes" cols="50" rows="5" ></textarea></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <table width="80%"  border="3" cellpadding="0" cellspacing="0" bordercolor="#cccccc">
          <tr bgcolor="#cccccc">
            <td width="50%">7 - REGULAMENTO </td>
            <td width="50%">&nbsp;</td>
          </tr>
          <tr bordercolor="#FFCC00" bgcolor="#FFCC00">
            <td>7.1 - Regulamento </td>
            <td width="50%"><a href="regulamento_pbrasil.php" target="_blank">ver regulamento</a> | <a href="../../regrasDCP_festrio_01.pdf">regras técnicas para DCP (pdf)</a></td>
          </tr>
          <tr class="form_required">
            <td><p>7.1.01 - Aprovação</p>
            <p class="resumo_regulamento">REGULAMENTO ITEM:<br></p>
            <p class="resumo_regulamento">A participação na <strong>Première Brasil </strong>implica na aceitação e cumprimento de todos os termos e condições estabelecidos no presente Regulamento.</p></td>
            <td><input name="regulamento" type="checkbox" value="concordo" required>
              li e concordo com o regulamento</td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <table width="80%"  border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="50%">&nbsp;</td>
            <td width="50%"><input type="submit" name="submit" id="submit" value="Enviar">
              <input type="reset" name="Reset" value="Limpar"></td>
          </tr>
        </table>
      </form>
      <p><img src="../footerbg.png" width="980" height="156"></p>
    </div>
    <script type="text/javascript">

            $("#distribuidora_cep").focusout(function(){
          //Início do Comando AJAX
          $.ajax({
            //O campo URL diz o caminho de onde virá os dados
            //É importante concatenar o valor digitado no CEP
            url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
            //Aqui você deve preencher o tipo de dados que será lido,
            //no caso, estamos lendo JSON.
            dataType: 'json',
            //SUCESS é referente a função que será executada caso
            //ele consiga ler a fonte de dados com sucesso.
            //O parâmetro dentro da função se refere ao nome da variável
            //que você vai dar para ler esse objeto.
            success: function(resposta){
              //Agora basta definir os valores que você deseja preencher
              //automaticamente nos campos acima.
              $("#distribuidora_logradouro").val(resposta.logradouro);
              $("#distribuidora_complemento").val(resposta.complemento);
              $("#distribuidora_bairro").val(resposta.bairro);
              $("#distribuidora_cidade").val(resposta.localidade);
              $("#distribuidora_uf").val(resposta.uf);
              //Vamos incluir para que o Número seja focado automaticamente
              //melhorando a experiência do usuário
              $("#distribuidora_numero").focus();
            }
          });
        });

            $("#produtora_cep").focusout(function(){
          //Início do Comando AJAX
          $.ajax({
            //O campo URL diz o caminho de onde virá os dados
            //É importante concatenar o valor digitado no CEP
            url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
            //Aqui você deve preencher o tipo de dados que será lido,
            //no caso, estamos lendo JSON.
            dataType: 'json',
            //SUCESS é referente a função que será executada caso
            //ele consiga ler a fonte de dados com sucesso.
            //O parâmetro dentro da função se refere ao nome da variável
            //que você vai dar para ler esse objeto.
            success: function(resposta){
              //Agora basta definir os valores que você deseja preencher
              //automaticamente nos campos acima.
              $("#produtora_logradouro").val(resposta.logradouro);
              $("#produtora_complemento").val(resposta.complemento);
              $("#produtora_bairro").val(resposta.bairro);
              $("#produtora_cidade").val(resposta.localidade);
              $("#produtora_uf").val(resposta.uf);
              //Vamos incluir para que o Número seja focado automaticamente
              //melhorando a experiência do usuário
              $("#produtora_numero").focus();
            }
          });
        });

        $("#destino_cep").focusout(function(){
          //Início do Comando AJAX
          $.ajax({
            //O campo URL diz o caminho de onde virá os dados
            //É importante concatenar o valor digitado no CEP
            url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
            //Aqui você deve preencher o tipo de dados que será lido,
            //no caso, estamos lendo JSON.
            dataType: 'json',
            //SUCESS é referente a função que será executada caso
            //ele consiga ler a fonte de dados com sucesso.
            //O parâmetro dentro da função se refere ao nome da variável
            //que você vai dar para ler esse objeto.
            success: function(resposta){
              //Agora basta definir os valores que você deseja preencher
              //automaticamente nos campos acima.
              $("#destino_logradouro").val(resposta.logradouro);
              $("#destino_complemento").val(resposta.complemento);
              $("#destino_bairro").val(resposta.bairro);
              $("#destino_cidade").val(resposta.localidade);
              $("#destino_uf").val(resposta.uf);
              //Vamos incluir para que o Número seja focado automaticamente
              //melhorando a experiência do usuário
              $("#destino_numero").focus();
            }
          });
        });
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  </body>
</html>
<?php mysqli_close($con); ?>