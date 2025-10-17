import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/Account/**/*.php',
        './resources/views/filament/account/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './resources/**/*.blade.php',
        './vendor/rotaz/filament-accounts/resources/views/**/*.blade.php'
    ],
    theme: {
        extend: {
            colors: {
                grayHover: "#EBEBEB",
                danger: "#FF3B30",
                primarySuccess: "#22C55E",
                secondary: "#F69400",
                blueSky: "#77C2F8",
            },
        },
    },
}
