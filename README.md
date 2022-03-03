Respondendo as questões feitas na atividade:



Resiliência: O que fazer para mitigar possíveis erros e controlar os possíveis erros recebidos da API?

    Existem algumas maneiras e boas práticas para mitigar e controlar esses possíveis erros, alguma delas são ter logs completos tendo muito claro qual erro aconteceu e onde aconteceu, sendo mais fácil de corrigi-lo, isso vale tanto para 
    falhas, tanto para sucessos nas requisições, isso combinado com ferramentas que geram relatórios de erros, assim todos conseguem ser notificados o quanto antes de possiveis erros. Ter a API sendo testada por testes unitários e de integração, por pelo menos 80% do projeto, dando mais segurança a todos. Além de monitorar o tempo de respostas das requisições, sendo o aumento do tempo de resposta um ótimo parametro para possiveis erros. Documentar o projeto e configurar as respostas de erros também é uma grande ajuda.


Performance: Quais boas práticas são aplicadas em banco de dados e no código para garantir performance?

    O melhor jeito para se garantir a perfomance em banco de dados e no código garantindo o máximo de sua performance é otimizando suas querys e códigos, no código o simples ato de fazer com que cada método só tenha uma função já faz a perfomance do código subir, além da duplicidade de códigos, documentação do projeto, variaveis bem definidas, fluxo da 
    lógica de regras de négocios estabelecidos e simples de entender, metodos refatorados, ter testes unitários e de integração no projeto, e rodar o código em um software sonar antes de ser testado, isso e mais outros centenas de boas práticas aumenta o desempenho do código, agora o mesmo serve para o banco de dados, uma estrutura bem planejada é o começo de tudo, se começar errado, vai terminar errado, manter os dados organizados e adequados a LGPD, otimização de querys, e um profissional especializado em banco de dados(DBA) na equipe.


Segurança: Como garantir segurança para as APIs do sistema?

    Existem diversas maneiras de garantir a segurança de uma API, alguma delas são por meio de tokens de acesso, apenas conseguindo fazer a requisição caso tenha o token, gateway de API, para controlar o tráfego da mesma, o uso de criptografia nos dados fazendo que somente usuários autenticados possam descriptografar esses dados e estabelecer cotas de chamadas, não deixando que a API ultrapasse certo número de requisições por certo intervalo de tempo, protegendo de ataques DNS.

Simultaneidade: Como trabalhar com simultaneidade se milhares de requisições forem solicitadas simultaneamente?

    A simultaneadade é garantida através de uma infraestrutura bem elaborada. Desde o teste de carga na sua aplicação pra saber como ela se comporta com um numero elevado de solicitações, até um load Balance que garante o aumento de processamento do servidor de acordo com o aumento de requisições, sem se esquecer que o banco de dados, deve suportar a quantidade elevada de consultas. É essencial que sua aplicação trabalhe com multithread para que tenha a capacidade de processar todas as requisições simultaneamente