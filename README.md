# Code generator

A package for object style code generation in php.

## Examples

Creating class

```php
(new ClassTemplate())
    ->setName('Test')
    ->addProperty(
        (new PropertyTemplate())
            ->setName('testProp')
            ->setScope('protected')
            ->setType('?string')
    )->addMethod(
        (new MethodTemplate())
            ->setScope('public')
            ->addArgument(
                (new ArgumentTemplate())
                    ->setName('data')
                    ->setType('string')
            )->setName(
                'setTestProp'
            )->setReturnType(
                'void'
            )->setBlock(
                (new BlockTemplate())
                    ->addLine('$this->testProp = $data')
            )
    )->addMethod(
        (new MethodTemplate())
            ->setScope('public')
            ->addArgument(
                (new ArgumentTemplate())
                    ->setName('test')
                    ->setType('string')
            )->setName(
                'testFun'
            )->setReturnType(
                'string'
            )->setBlock(
                (new BlockTemplate())
                    ->addLine('return \'test\'.$test;')
            )
    )
```

If block

```php
$aVariable = (new GetTemplate())->setVariable((new VariableTemplate())->setName('a'));
$bVariable = (new GetTemplate())->setVariable((new VariableTemplate())->setName('b'));
$logicBlock = (new LogicBlockTemplate())->logic(
    (new LogicTemplate())->setLogic(
        "<",
        $aVariable,
        $bVariable
    )
)->and()->logic(
    (new LogicTemplate())->setLogic(
        ">",
        $aVariable,
        $bVariable
    )
)->or()->logic(
    (new LogicTemplate())->setLogic(
        "===",
        $aVariable,
        $bVariable
    )
);
```

While block

```php
$iVariable = (new GetTemplate())->setVariable((new VariableTemplate())->setName('i'));
$countVariable = (new GetTemplate())->setVariable((new VariableTemplate())->setName('count'));
$whileTemplate = (new WhileTemplate())
    ->setLogic(
        (new LogicBlockTemplate())
            ->logic(
                (new LogicTemplate())
                    ->setLogic(
                        '<',
                        $iVariable,
                        $countVariable
                    )
            )
    )
    ->setBlock(
        (new BlockTemplate())->addLine('$i++;')
    );
```

## Fabric

Use Fabrics for ease and fast work with all generator object

```php
(new Fabric());
(new LogicFabric());
```