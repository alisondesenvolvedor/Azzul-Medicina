<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valide os dados recebidos do formulário
    $nomeEmpresa = $_POST["NomeEmpresaRazaoSocial"];
    $cnpj = $_POST["CNPJ"];
    $telefone = $_POST["Telefone"];
    $email = $_POST["Email"];
    $nomeColaborador = $_POST["NomeColaborador"];
    $dataNascimento = $_POST["DataNascimento"];
    $rg = $_POST["RG"];
    $cpf = $_POST["CPF"];
    $setor = $_POST["Setor"];
    $funcao = $_POST["Funcao"];
    $tipoASO = $_POST["TipoASO"];
    $dataAdmissao = $_POST["DataAdmissao"];
    $dataExameAgendamento = $_POST["DataExameAgendamento"];
    $examesComplementares = $_POST["ExamesComplementares"];

    // Configuração de cabeçalho para o e-mail
    $to = "exames@azzulmedicina.com.br"; // Substitua pelo endereço de e-mail de destino
    $subject = "Formulário de Agendamento de ASO";
    $message = "Nome da Empresa/Razão Social: $nomeEmpresa\n";
    $message .= "CNPJ: $cnpj\n";
    $message .= "Telefone: $telefone\n";
    $message .= "E-mail: $email\n";
    $message .= "Nome do Colaborador: $nomeColaborador\n";
    $message .= "Data de Nascimento: $dataNascimento\n";
    $message .= "RG com órgão emissor, UF de emissão, data de emissão: $rg\n";
    $message .= "CPF: $cpf\n";
    $message .= "Setor: $setor\n";
    $message .= "Função: $funcao\n";
    $message .= "Tipo de ASO: $tipoASO\n";
    $message .= "Data de Admissão: $dataAdmissao\n";
    $message .= "Data do Exame/Agendamento: $dataExameAgendamento\n";
    $message .= "Exames Complementares: $examesComplementares\n";

    $headers = "From: $email";

    // Se o envio de e-mail for bem-sucedido, redirecione para a página de confirmação
    if (mail($to, $subject, $message, $headers)) {
        // Redirecione para a página de confirmação após o envio do e-mail
        header("Location: confirmacao.html");
        exit; // Certifique-se de encerrar o script após o redirecionamento
    } else {
        echo "Ocorreu um erro ao enviar o e-mail. Por favor, tente novamente mais tarde.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
