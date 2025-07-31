# 🔒 Política de Segurança

## Versões Suportadas

O KISS-PHP está atualmente em desenvolvimento ativo. As seguintes versões recebem atualizações de segurança:

| Versão | Suportada          |
| ------ | ------------------ |
| alpha  | :white_check_mark: |

> **Nota**: Como o framework está em fase alpha, recomendamos **não usar em produção** até o lançamento da versão estável.

## Reportando Vulnerabilidades de Segurança

A segurança é uma prioridade para o KISS-PHP. Se você descobrir uma vulnerabilidade de segurança, siga o processo abaixo:

### 🚨 Processo de Reporte

1. Crie uma issue pública no GitHub
2. **Inclua** as seguintes informações:
   - Descrição detalhada da vulnerabilidade
   - Passos para reproduzir o problema
   - Impacto potencial
   - Sugestões de correção (se houver)

### 📧 Template de Reporte

```
Assunto: [SECURITY] Vulnerabilidade em KISS-PHP

Descrição:
[Descreva a vulnerabilidade]

Reprodução:
1. [Passo 1]
2. [Passo 2]
3. [Passo 3]

Impacto:
[Descreva o impacto potencial]

Ambiente:
- Versão do KISS-PHP: 
- Versão do PHP: 
- Sistema Operacional: 

Código de Exemplo:
```php
// Código que demonstra a vulnerabilidade
```

## 🛡️ Melhores Práticas de Segurança

### Para Desenvolvedores do Framework

- **Validação de entrada**: Sempre valide e sanitize dados de entrada
- **Escape de saída**: Use escape adequado ao renderizar dados
- **Princípio do menor privilégio**: Conceda apenas as permissões mínimas necessárias
- **Criptografia**: Use bibliotecas de criptografia confiáveis
- **Logging seguro**: Evite logar informações sensíveis

### Para Usuários do Framework

#### 🔐 Configuração Segura

```php
// .env - Nunca commite este arquivo
APP_ENV=production
APP_DEBUG=false
DATABASE_PASSWORD=senha_forte_aqui
JWT_SECRET=sua_chave_secreta_muito_forte
```

#### 🛡️ Validação de Dados

```php
#[Controller('/users')]
class Email extends DataValidator
{
  public __contruct(private string $email) {} 

  public function check(): array
  {
    return new Validate()
      ->when(empty($this->email))
      ->notify('O campo email é obrigatório!')

      ->when(filter_var($this->email, FILTER_VALIDATE_EMAIL))
      ->notify('Formato de email inválido!')

      ->result();
  }
}
```

#### 🔒 Middleware de Segurança

```php
class SecurityHeaders extends WebMiddleware
{
    public function handle(Request $request, Closure $next): ?Request
    {
        // Adicione headers de segurança
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: DENY');
        header('X-XSS-Protection: 1; mode=block');
        
        return $next($request);
    }
}
```

## 🔍 Vulnerabilidades Conhecidas

Atualmente não há vulnerabilidades conhecidas reportadas. Esta seção será atualizada conforme necessário.

## 📋 Checklist de Segurança

### Para Desenvolvimento

- [ ] **Validação de entrada** implementada
- [ ] **Escape de saída** configurado
- [ ] **Headers de segurança** adicionados
- [ ] **Autenticação** robusta
- [ ] **Autorização** adequada
- [ ] **Logging** seguro
- [ ] **Tratamento de erros** que não vaza informações
- [ ] **Dependências** atualizadas

### Para Produção

- [ ] **HTTPS** configurado
- [ ] **Firewall** ativo
- [ ] **Backups** regulares
- [ ] **Monitoramento** implementado
- [ ] **Logs** protegidos
- [ ] **Permissões de arquivo** configuradas
- [ ] **Variáveis de ambiente** protegidas

## 🔄 Atualizações de Segurança

As atualizações de segurança são distribuídas através de:

1. **Releases no GitHub** com tags de segurança
2. **Announcements** na documentação
3. **Issues marcadas** com label `security`

### Aplicando Atualizações

```bash
# Sempre mantenha o framework atualizado
composer update kiss-php/framework

# Verifique por vulnerabilidades nas dependências
composer audit
```

## 🚫 Responsabilidades

### O que NÃO fazemos

- **Auditoria de segurança** de aplicações de terceiros
- **Suporte para versões** não suportadas
- **Garantias de segurança** para código personalizado

### O que Você deve fazer

- **Manter** o framework atualizado
- **Seguir** as melhores práticas de segurança
- **Validar** todas as entradas do usuário
- **Testar** regularmente por vulnerabilidades
- **Monitorar** logs de segurança

## 🏆 Reconhecimento

Reconhecemos e agradecemos aos pesquisadores de segurança que reportam vulnerabilidades de forma responsável. Contribuidores podem ser reconhecidos em:

- **Hall of Fame** de segurança
- **Créditos** em releases
- **Menção** na documentação

---

## ⚖️ Divulgação Responsável

Seguimos o princípio de **divulgação coordenada**:

1. **Correção** é desenvolvida em privado
2. **Patch** é lançado
3. **Detalhes** são divulgados após um período apropriado
4. **Créditos** são dados ao descobridor

---

<div align="center">
  <strong>A segurança é responsabilidade de todos! 🔒</strong>
  
  Feito com 💜 no Brasil
</div>