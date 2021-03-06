<?php

namespace Drupal\tpedu\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'snippets_default' formatter.
 *
 * @FieldFormatter(
 *   id = "classes_default",
 *   label = "班級",
 *   field_types = {
 *     "tpedu_classes"
 *   },
 * )
 */
class ClassesDefaultFormatter extends FormatterBase
{
    public function viewElements(FieldItemListInterface $items, $langcode)
    {
        $elements = array();
        foreach ($items as $delta => $item) {
            $classes = explode(',', $item->class_id);
            foreach ($classes as $c) {
                $myclass = one_class($c);
                if ($myclass) {
                    $myclassname .= $myclass->name.' ';
                }
            }
            $source = array(
                '#type' => 'inline_template',
                '#template' => '班級： {{name}}',
                '#context' => [
                    'name' => $myclassname,
                ],
            );
            $elements[$delta] = array('#markup' => drupal_render($source));
        }

        return $elements;
    }
}
