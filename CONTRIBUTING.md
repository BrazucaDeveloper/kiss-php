# 🤝 Contribuindo para o KISS-PHP

Obrigado por considerar contribuir para o KISS-PHP! Valorizamos todas as contribuições, desde correções de bugs até novos recursos.

## 📋 Índice

- [Como Contribuir](#como-contribuir)
- [Configuração do Ambiente](#configuração-do-ambiente)
- [Diretrizes de Código](#diretrizes-de-código)
- [Processo de Pull Request](#processo-de-pull-request)
- [Reportando Bugs](#reportando-bugs)
- [Sugerindo Recursos](#sugerindo-recursos)
- [Documentação](#documentação)

## Como Contribuir

Existem várias maneiras de contribuir com o KISS-PHP:

- 🐛 **Reportar bugs**: Encontrou um problema? Nos ajude a corrigi-lo!
- 💡 **Sugerir recursos**: Tem uma ideia para melhorar o framework?
- 📖 **Melhorar documentação**: Ajude outros desenvolvedores com guias e exemplos
- 🔧 **Corrigir código**: Resolva issues abertas ou implemente novos recursos
- 🧪 **Escrever testes**: Ajude a manter a qualidade do código

## Configuração do Ambiente

### Pré-requisitos

- PHP 8.4 ou superior
- Composer
- Git

### Configuração Local

1. **Fork** o repositório
2. **Clone** seu fork:
   ```bash
   git clone https://github.com/BrazucaDeveloper/kiss-php.git
   cd kiss-php
   ```

3. **Instale** as dependências:
   ```bash
   composer install
   ```

4. **Configure** o ambiente de desenvolvimento:
   ```bash
   cp .env.example .env
   ```

5. **Execute** os testes para verificar se tudo está funcionando:
   ```bash
   composer test
   ```

## Diretrizes de Código

### Filosofia KISS

Lembre-se sempre da filosofia **Keep It Stupid Simple**:

- ✅ Prefira soluções simples e diretas
- ✅ Evite over-engineering
- ✅ Mantenha o framework intuitivo
- ✅ Produza uma boa php-doc das classes e métodos que serão usados pelo nosso usuário

### Padrões de Código

- **PSR-12**: Siga o padrão de codificação PSR-12
- **Nomes descritivos**: Use nomes claros para variáveis, métodos e classes
- **Comentários**: Não use comentários para explicar código díficil, seu código deve ser o suficiente para entendê-lo.
- **Tipo de retorno**: Sempre declare tipos de retorno quando possível

## Processo de Pull Request

### Antes de Submeter

1. **Certifique-se** de que os testes passam:
   ```bash
   composer test
   ```

2. **Execute** o linter:
   ```bash
   composer lint
   ```

3. **Atualize** a documentação se necessário

### Submetendo o PR

1. **Crie** uma branch para sua feature:
   ```bash
   git checkout -b feature/nova-funcionalidade
   ```

2. **Faça** commits com mensagens claras:
   ```bash
   git commit -m "feat: adiciona validação de email customizada"
   ```

3. **Push** para seu fork:
   ```bash
   git push origin feature/nova-funcionalidade
   ```

4. **Abra** um Pull Request com:
   - Título descritivo
   - Descrição detalhada das mudanças
   - Referência a issues relacionadas (se aplicavél)
   - Screenshots (se aplicável)

### Template de PR

```markdown
## Descrição
Breve descrição das mudanças

## Tipo de Mudança
- [ ] Bug fix
- [ ] Nova funcionalidade
- [ ] Breaking change
- [ ] Melhoria de performance
- [ ] Documentação

## Como Testar
1. Passos para testar
2. Comportamento esperado

## Checklist
- [ ] Código segue os padrões do projeto
- [ ] Testes passam
- [ ] Documentação atualizada
- [ ] Sem breaking changes desnecessárias
```

## Reportando Bugs

Use o template de issue para bugs:

**Título**: Descrição concisa do problema

**Descrição**:
- Comportamento atual
- Comportamento esperado
- Passos para reproduzir
- Versão do PHP
- Versão do KISS-PHP

## Sugerindo Recursos

Para sugerir novos recursos:

1. **Verifique** se já não existe uma issue similar
2. **Descreva** o problema que o recurso resolve
3. **Proponha** uma solução alinhada com a filosofia KISS
4. **Forneça** exemplos de uso

## Documentação

A documentação é crucial para o sucesso do projeto:

### Estrutura da Documentação

```
docs/
├── pt/                 # Documentação em português
│   ├── documentation.md
│   ├── quickstart.md
│   └── examples.md
└── en/                 # Documentação em inglês
    ├── README.md
    ├── quickstart.md
    └── examples.md
```

### Contribuindo com Docs

- **Mantenha** ambas as versões (PT/EN) atualizadas
- **Use** exemplos práticos
- **Seja** claro e conciso
- **Teste** os exemplos de código

## Reconhecimento

Todas as contribuições são valorizadas e reconhecidas. Os contribuidores serão listados no README e releases.

---

## Código de Conduta

Ao participar deste projeto, você concorda em seguir nosso [Código de Conduta](CODE_OF_CONDUCT.md).

---

<div align="center">
  <strong>Obrigado por contribuir com o KISS-PHP! 💜</strong>
  
  Feito com 💜 no Brasil
</div>