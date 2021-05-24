# Saga Instance Doctrine Bridge

## Table Of Contents
- [Requirements](#requirements)
- [About package](#about-package)
- [Installation](#installation)
- [Usage](#usage)
- [License](#license)

## Requirements  
- php: >= 7.1
- [phpsagas/orchestrator](https://github.com/phpsagas/orchestrator)
- doctrine/orm: ^2.9

## About package
This component is the part of [phpsagas framework](https://github.com/phpsagas).  
The package contains implementation of saga instance repository based on [doctrine/orm](https://packagist.org/packages/doctrine/orm).

## Installation
You can install the package using [Composer](https://getcomposer.org/):
```bash
composer require phpsagas/doctrine-bridge
```

## Usage
You can use `DoctrineBasedSagaInstanceRepository` as `SagaInstanceRepositoryInterface` implementation.

## License
Saga doctrine bridge is released under the [MIT license](LICENSE). 
