<?php

declare(strict_types=1);

namespace Netgen\Bundle\LayoutsEzPlatformSiteApiBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class DefaultAppPreviewPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!$container->hasParameter('ezpublish.siteaccess.list')) {
            return;
        }

        $defaultRule = [
            'template' => $container->getParameter(
                'netgen_layouts.app.ezplatform.item_preview_template'
            ),
            'match' => [],
            'params' => [],
        ];

        $scopes = array_merge(
            ['default'],
            $container->getParameter('ezpublish.siteaccess.list')
        );

        foreach ($scopes as $scope) {
            if (!$container->hasParameter("ezsettings.{$scope}.ngcontent_view")) {
                continue;
            }

            $scopeRules = $container->getParameter("ezsettings.{$scope}.ngcontent_view");
            $scopeRules = $this->addDefaultPreviewRule($scopeRules, $defaultRule);
            $container->setParameter("ezsettings.{$scope}.ngcontent_view", $scopeRules);
        }
    }

    /**
     * Adds the default Site API content preview template to default scope as a fallback
     * when no preview rules are defined.
     */
    private function addDefaultPreviewRule(?array $scopeRules, array $defaultRule): array
    {
        $scopeRules = is_array($scopeRules) ? $scopeRules : [];

        $layoutsRules = $scopeRules['nglayouts_app_preview'] ?? [];

        $layoutsRules += [
            '___nglayouts_app_preview_default___' => $defaultRule,
        ];

        $scopeRules['nglayouts_app_preview'] = $layoutsRules;

        return $scopeRules;
    }
}