<div class="container-padrao fullpage">
    <div class="container center">
        <div class="form-container">
            <form class="form" id="form-cadastro">
                <div class="form-main">
                    <div class="input-item">
                        <input type="text" id="name" placeholder="Nome" require>
                    </div>
                    <div class="input-item">
                        <input type="email" id="email" placeholder="E-mail" require>
                    </div>
                    <div class="input-item">
                        <input type="password" id="password" placeholder="Senha" minlength="8" require>
                    </div>
                </div>

                <div class="form-footer">
                    <a href="<?=base_url('assets/regulamento.pdf')?>" target="blank" class="link-padrao">
                        Confira regulamento
                    </a>
                    <div class="button-container end">
                        <button>
                            Cadastrar
                            <span class="icon">
                                <svg focusable="false" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" fill="currentColor" aria-label="Open resource" width="20" height="20" viewBox="0 0 32 32" role="img"><path d="M26,28H6a2.0027,2.0027,0,0,1-2-2V6A2.0027,2.0027,0,0,1,6,4H16V6H6V26H26V16h2V26A2.0027,2.0027,0,0,1,26,28Z"></path><path d="M20 2L20 4 26.586 4 18 12.586 19.414 14 28 5.414 28 12 30 12 30 2 20 2z"></path></svg>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-privacidade">
    <div class="termos-privacidade">
        <div class="termos-privacidade-head">
            <h2><strong>Termos de privacidade</strong></h2>
        </div>
        <div class="termos-privacidade-body">
            <h3><strong>Privacidade campanha <a href="desafiomundohibrido.com" class="link-destaque">desafiomundohibrido.com</a></strong></h3>
            <p>
                A Política de Privacidade contém informações sobre coleta, uso, armazenamento, tratamento e proteção de dados pessoais dos
                usuários e visitantes do site desafiomundohíbrido.com, com a finalidade de demonstrar transparência e esclarecer a forma como os usuários podem gerenciar ou excluir suas informações pessoais.
            </p>

            <h3><strong>Voluntariedade da campanha e política de privacidade da MCM</strong></h3>
            <p>
            O envio de dados pessoais para participação no Desafio Mundo Híbrido é voluntário e será feito diretamente entre o participante e a MCM Brand Experience que será a Controladora de tais informações. Para saber mais sobre como a MCM Brand Experience realiza o tratamento de seus dados, consulte a Política de Privacidade disponível no site da empresa, <a href="https://www.mcmbrandexperience.com/pol%C3%ADtica-de-privacidade" class="link-destaque">clique aqui</a>.
            </p>

            <h3><strong>Como recolhemos os dados pessoais do usuário e para quais finalidades</strong></h3>
            <p>
                Os dados pessoais são recolhidos da seguinte forma: quando o usuário cria uma conta na plataforma <a href="desafiomundohibrido.com" class="link-destaque">desafiomundohibrido.com</a>, as informações são usadas para a finalidade de identificação de acesso (nome completo e e-mail). A partir desses dados, podemos identificá-lo(a), além de garantir maior segurança e bem-estar às suas necessidades. Fica ciente o usuário de que seu perfil na plataforma estará acessível apenas para o titular do cadastro, fica à cargo do mesmo a opção de fornecer ou não o login e senha para terceiros.
            </p>
            <p>
            Além disso, ao fazer o login para realização do desafio, esses dados ficarão hospedados na plataforma pelo período vigente da campanha, e serão excluídos mediante a pedido do usuário e ao término da ação.
            </p>

            <h3><strong>Aviso de cookies para visitantes</strong></h3>
            <p>
                O site <a href="desafiomundohibrido.com" class="link-destaque">desafiomundohibrido.com</a> não fará uso da coleta de cookies para monitorar acessos sem cadastro prévio.
            </p>

            <h3><strong>Por quanto tempo os dados pessoais ficam armazenados?</strong></h3>
            <p>
                Os dados pessoais do usuário são armazenados pela plataforma durante o período necessário para a prestação da campanha ou o cumprimento das finalidades previstas no presente documento, conforme o disposto no inciso I do artigo 15 da Lei 13.709/18. A qualquer momento, os dados podem ser removidos a pedido do usuário.
            </p>
            <p>
                É possível solicitar alteração ou remover tais permissões, através do e-mail: <a href="mailto:mcm@mcm.br.com" class="link-destaque">mcm@mcm.br.com</a>. Caso queira revogar também o consentimento para que não façamos o envio de comunicados, o mesmo poderá ser realizado por meio da opção de cancelamento presente no rodapé dos e-mails.
            </p>

            <h3><strong>Segurança dos dados armazenados</strong></h3>
            <p>
                A plataforma se compromete a aplicar as medidas técnicas e organizativas aptas a proteger os dados pessoais de acessos não autorizados e de situações de destruição, perda, alteração, comunicação ou difusão de tais dados. Utilizará técnicas de criptografia, firewalls e outras tecnologias e procedimentos aplicáveis à segurança, de forma a proteger a consistência e a segurança de suas informações e prevenir o acesso não autorizado ou uso impróprio.
            </p>
            <p>
                O sistema desenvolvido pela MCM Brand Experience para o site meusparceirosemcasa.com.br não utiliza APIs. Todas as requisições são feitas através de CSRF token e requisições de sistemas terceiros foram desabilitadas. Para a construção do back-end foi utilizado o framework CodeIgniter v3, utilizando métodos de segurança built-in para evitar qualquer tipo de SQL Injection.
            </p>

            <h3><strong>Injeção</strong></h3>
            <p>
                O framework utilizado para construção (CodeIgniter v3) possui métodos built-in para prevenção de injeção de SQL. Todos os dados transacionados por requisições são tratados e escapados nos controladores do projeto. No momento de execução das queries, os dados transacionados são novamente verificados pelo framework.
            </p>

            <h3><strong>Quebra de Autenticação</strong></h3>
            <p>
                O sistema não utiliza métodos de login persistente, portanto, cada login tem validade de apenas uma sessão.
            </p>

            <h3><strong>Exposição de dados sensíveis</strong></h3>
            <p>
                Os únicos dados armazenados são o nome e email do usuário. A senha é criptografada utilizando a função password_hash nativa do PHP.
            </p>

            <h3><strong>XML External Entities (XXE)</strong></h3>
            <p>
                Sistema não possui transação de nenhum tipo de XML.
            </p>

            <h3><strong>Controle de Acesso Quebrado</strong></h3>
            <p>
                O único arquivo de acesso público do sistema são as badges geradas pelos usuários, uma vez que elas podem ser compartilhadas em redes sociais. Cada imagem gerada é gerada usando um nome único. Todos os outros arquivos do sistema são protegidos com permissões limitadas. O próprio framework utilizado por padrão impede o acesso direto à arquivos e pastas protegidos do sistema.
            </p>

            <h3><strong>Configuração Incorreta de Segurança</strong></h3>
            <p>
                O sistema é de baixa complexidade. Todas as medidas necessárias para proteger o sistema foram aplicados. O deploy da aplicação é feito através do GIT, e os repositórios estão armazenados em uma conta do GitLab.
            </p>

            <h3><strong>Cross-Site Scripting (XSS)</strong></h3>
            <p>
                Os acessos externos ao sistema foram desabilitados. Não há necessidade de receber dados externos.
            </p>

            <h3><strong>Des-serialização Insegura</strong></h3>
            <p>
                O acesso externo ao sistema está desabilitado e a utilização de CSRF token foi implementado para toda e qualquer requisição, não haverá transação de dados que não sejam gerados propriamente dentro do sistema.
            </p>

            <h3><strong>Utilização de componentes com vulnerabilidades conhecidas</strong></h3>
            <p>
                O Framework utilizado (CodeIgniter) possui padrões estritos de segurança, além de ser um dos frameworks open source mais difundidos do mundo.
            </p>

            <h3><strong>Logging e Monitoramento Insuficientes</strong></h3>
            <p>
                Todas as ações de requisição do site geram logging. São elas: cadastro de novo usuário, exclusão de cadastro e criação de novas tags. A qualquer momento esse log pode ser requisitado a desenvolvedora MCM Brand Experience. Se for necessário, será aplicado o uso de recaptcha para login ao sistema.
            </p>

            <h3><strong>Os dados pessoais armazenados serão transferidos a terceiros?</strong></h3>
            <p>
                Os dados pessoais não serão transferidos a terceiros. Todas as informações coletadas são de uso exclusivo da plataforma e da desenvolvedora e controladora MCM Brand Experience.
            </p>

            <h3><strong>Direitos do titular</strong></h3>
            <p>
                Você pode solicitar acesso, atualização ou correção de suas informações pessoais.
            </p>
            <p>
                Se o processamento de suas informações pessoais estiver sujeito à Lei Geral de Proteção de Dados do Brasil (“LGPD”), adicionalmente, você possui o direito de requisitar: (i) confirmação da existência do tratamento; (ii) anonimização, bloqueio ou eliminação de dados; (iii) portabilidade dos dados a outro fornecedor de serviço ou produto; (iv) eliminação dos dados pessoais tratados com o seu consentimento; (v) informação das entidades públicas e privadas com as quais o controlador realizou uso compartilhado de dados; (vi) informação sobre a possibilidade de não fornecer consentimento e sobre as consequências da negativa; (vii) revogação do consentimento.
            </p>

            <h3><strong>Consentimento uso de imagem e dados de menores de idade</strong></h3>
            <p>
                A autorização do uso de imagem e dos dados serão exclusivamente de seu responsável legal.
            </p>
            <p>
                Na qualidade de um dos pais ou responsável do menor, AUTORIZA o site <a href="desafiomundohibrido.com" class="link-destaque">desafiomundohibrido.com</a> a usar suas informações pessoais correspondente a arquivos de imagens e nomes, e CONCORDA que a MCM Brand Experience use essas informações para a divulgação do resultado do concurso.
            </p>
            <p>
                O usuário tem direito de retirar o seu consentimento a qualquer tempo, para tanto deve entrar em contato através do e-mail <a href="mailto:mcm@mcm.br.com" class="link-destaque">mcm@mcm.br.com</a> ou através do canal: https://www.mcmbrandexperience.com/contato.
            </p>

            <h3><strong>Consentimento</strong></h3>
            <p>
                Ao utilizar os serviços e fornecer as informações pessoais na plataforma, o usuário está consentindo com a presente Política de Privacidade para fins de cadastro e envio de peças de comunicação da campanha por e-mail.
            </p>
            <p>
                O usuário tem direito de retirar o seu consentimento a qualquer tempo, para tanto deve entrar em contato através do e-mail <a href="mailto:mcm@mcm.br.com" class="link-destaque">mcm@mcm.br.com</a> ou através do canal: https://www.mcmbrandexperience.com/contato.
            </p>
        </div>
        <div class="termos-privacidade-footer">
            <button class="primary" onclick="aceitoTermos()">Aceitar</button>
            <a href="/" class="secondary">Cancelar</a>
        </div>
    </div>
</div>

<div class="container-popup">
    <div class="popup-info"></div>
</div>
