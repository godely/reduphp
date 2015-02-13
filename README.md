# ReduPHP

Esse pacote de PHP encapsula as funcionalidades da API REST abstraindo a lógica das requisições HTTP.

Depedências utilizadas:

- bshaffer/oauth2-server-php
- rmccue/requests

## Instalação

É necessário composer (instalador de dependências para PHP) para a instalação do ReduPHP.
Coloque no seu composer.json:

```sh
{
    "repositories": [
        {
            "url": "https://github.com/godely/reduphp.git",
            "type": "git"
        }
    ],
    "require": {
        "godely/reduphp": "*"
    }
}
```

## Como usar a api

A implementação da biblioteca segue os mesmos padrões definidos na [documentação](http://developers.redu.com.br). Ou seja, os argumentos dos metódos possuem os mesmos nomes que foram documentados.
Por exemplo, se na documentação há uma requisição tipo ``GET`` onde é possível passar um parâmetro ``type`` via querystring, a chamada da função PHP teria esse formato:

```php
redu.nomeDaFuncao().bind(array("id" => "um id", "type" => "um tipo"))
```

## Como contribuir

1. Fork redujs no github.com
2. Crie um novo branch
3. Dê commit nas mudanças
4. Mande um pull request

Este projeto é mantido pelo [OpenRedu](http://openredu.cin.ufpe.br/?lang=pt).

## Copyright

Copyright (c) 2014 Openredu Educational Technologies

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
