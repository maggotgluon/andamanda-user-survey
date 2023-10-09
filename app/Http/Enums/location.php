<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class location extends Enum
{
    const Ticketing = '172.16.110.196';
    const LostAndFound = '172.16.110.224';
    const Locker = '172.16.110.246';
    const Retail = '172.16.110.248';
    const TheVillage = '172.16.110.249';
    const Tropical = '172.16.110.244';
    const EmeraldSandbar = '172.16.110.161';
    const Wavebar = '172.16.110.205';
}
