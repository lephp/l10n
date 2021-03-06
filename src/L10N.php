<?php
/**
 * Created in LeEco
 * User: Marlin<toleranthink@gmail.com>
 * Date: 4/27/16
 * Time: 6:03 PM
 * @copyright LeEco
 * @since 1.0.0
 */
namespace L10n;

class L10n
{
    /**
     * 根据域获取翻译文本
     * @param string $text 文本
     * @param string $domain 模块/域
     * @return string 对应的翻译文本
     */
    public static function __($text, $domain = 'default')
    {
        return self::translate($text, $domain);
    }

    /**
     * 根据域获取翻译文本并打印
     * @param string $text 文本
     * @param string $domain 模块/域
     */
    public static function _e($text, $domain = 'default')
    {
        echo self::translate($text, $domain);
    }

    /**
     * 根据域及上下文获取翻译文本
     * @param string $text 文本
     * @param string $context 上下文
     * @param string $domain 模块/域
     * @return string 对应的翻译文本
     */
    public static function _x($text, $context, $domain = 'default')
    {
        return self::translateWithGettextContext($text, $context, $domain);
    }

    /**
     * 根据域及上下文获取翻译文本并打印
     * @param string $text 文本
     * @param string $context 上下文
     * @param string $domain 模块/域
     */
    public static function _ex($text, $context, $domain = 'default')
    {
        echo self::translateWithGettextContext($text, $context, $domain);
    }

    /**
     * 翻译复数文本
     * @param $single
     * @param $plural
     * @param $number
     * @param string $domain
     * @return NoopTranslations|Translations
     */
    public static function _n($single, $plural, $number, $domain = 'default')
    {
        $translations = self::getTranslationsForDomain($domain);
        $translations = $translations->translatePlural($single, $plural, $number);
        return $translations;
    }

    /**
     * 根据上下文翻译复数文本
     * @param $single
     * @param $plural
     * @param $number
     * @param $context
     * @param string $domain
     * @return NoopTranslations|Translations|void
     */
    public static function _nx($single, $plural, $number, $context, $domain = 'default')
    {
        $translations = self::getTranslationsForDomain($domain);
        $translations = $translations->translatePlural($single, $plural, $number, $context);
        return $translations;
    }

    /**
     * 翻译带 HTML 标签的文本
     * Usage:
     * l10n::esc_html__("<a href="javascript:;">Where amazing happens</a>","default")
     * Output: <a href="javascript:;">不可思议的游戏</a>
     * @param $text
     * @param string $domain
     * @TODO
     */
    public static function esc_html__($text, $domain = 'default')
    {

    }

    /**
     * 翻译带 HTML 标签的文本
     * Usage:
     * l10n::esc_html_e("<a href="javascript:;">Where amazing happens</a>","default")
     * Output: <a href="javascript:;">不可思议的游戏</a>
     * @param $text
     * @param string $domain
     * @TODO
     */
    public static function esc_html_e($text, $domain = 'default')
    {

    }

    /**
     * 翻译文本
     * @param $text
     * @param string $domain
     * @return NoopTranslations|Translations|mixed
     */
    public static function translate($text, $domain = 'default')
    {
        $translations = self::getTranslationsForDomain($domain);
        $translations = $translations->translate($text);
        return $translations;
    }

    /**
     * 翻译带上下文的文本
     * @param $text
     * @param $context
     * @param string $domain
     * @return NoopTranslations|Translations|mixed
     */
    public static function translateWithGettextContext($text, $context, $domain = 'default')
    {
        $translations = self::getTranslationsForDomain($domain);
        $translations = $translations->translate($text, $context);
        return $translations;
    }

    /**
     * @param $domain
     * @return NoopTranslations|Translations
     */
    public static function getTranslationsForDomain($domain)
    {
        global $l10n;
        if (!isset($l10n[$domain])) {
            $l10n[$domain] = new NoopTranslations();
        }
        return $l10n[$domain];
    }

    /**
     * @param $domain
     * @param $moFile
     * @return bool
     */
    public static function loadTextDomain($domain, $moFile)
    {
        global $l10n;
        $mo = new Mo();
        if (!$mo->importFromFile($moFile)) return false;
        if (isset($l10n[$domain]))
            $mo->mergeWith($l10n[$domain]);

        $l10n[$domain] = &$mo;
        return true;

    }
}
