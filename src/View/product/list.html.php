<?php

use Model\Entity\Product;
use Service\Product\PriceSorter;
use Comparator\PriceComparator;

/**
 * @var Closure $renderLayout
 * @var Product[] $productList
 * @var Closure $path
 */
$body = function () use ($productList, $path) {
?>
    <table cellpadding="40" cellspacing="0" border="0">
        <tr><td colspan="3" align="center">Наши курсы</td></tr>
        <tr>
            <td colspan="3" align="left">Сортировать по:
                <a href="<?= $path('product_list') ?>?sort=price">Цене</a>
                <a href="<?= $path('product_list') ?>?sort=name">Названию</a>
            </td>
        </tr>
        <?php
        $priceSorter = new PriceSorter(new PriceComparator());
        $priceSorterArray = $priceSorter->sort($productList); ?>
        <?php for ($i = 0; $i < count($priceSorterArray);): ?>
            <tr>
                <?php for ($col = 0; $col < 3; $col++, $i++): ?>
                    <td style="text-align: center">
                        <a href="<?= $path('product_info', ['id' => $priceSorterArray[$i]->getId()]) ?>"><?= $priceSorterArray[$i]->getName() ?></a>
                        <br /><br />
                        <?= $priceSorterArray[$i]->getPrice() ?> руб.
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
<?php
};


$renderLayout(
    'main_template.html.php',
    [
        'title' => 'Курсы',
        'body' => $body,
    ]
);

