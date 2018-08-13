<?php
/*
 * The MIT License
 *
 * Copyright 2018 Jordi Jolink.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
if (!defined('BOOTSTRAP')) { die('Access denied'); }

/**
 * Check if the Criteo tags need to be inserted
 * @param $controller
 * @param $mode
 * @param $action
 * @param $dispatch_extra
 * @param $area
 */
function fn_soneritics_criteo_before_dispatch($controller, $mode, $action, $dispatch_extra, $area)
{
    // Only for the customer area
    if (AREA != 'C') {
        return;
    }

    // Check if the current page contains data we should process
    switch ("{$controller}.{$mode}") {
        case 'index.index':
            $template = 'homepage';
            break;

        case 'categories.view':
        case 'products.search':
            $template = 'listing';
            break;

        case 'products.view':
            $template = 'product';
            break;

        case 'checkout.cart':
            $template = 'cart';
            break;

        case 'checkout.complete':
            $template = 'sales';
            break;
    }

    // Set view variable for the addon
    if (!empty($template)) {
        Tygh::$app['view']->assign('soneriticsCriteoPage', $template);
        Tygh::$app['view']->assign('soneriticsCriteoEmail', \Tygh\Registry::get('addons.soneritics_criteo.email'));
    }
}
