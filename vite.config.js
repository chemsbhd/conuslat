import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/animate.css',
                'resources/css/app.css',
                'resources/css/bootsnav.css',
                'resources/css/bootstrap.min.css',
                'resources/css/flaticon.css',
                'resources/css/font-awesome.min.css',
                'resources/css/owl.carousel.min.css',
                'resources/css/owl.theme.default.min.css',
                'resources/css/responsive.css',
                'resources/css/style.css',

                'resources/js/jquery.js',
                'resources/js/jquery.appear.js',
                'resources/js/jquery.sticky.js',
                'resources/js/bootsnav.js',
                'resources/js/bootstrap.js',
                'resources/js/modernizr.min.js',
                'resources/js/progressbar.js',
                'resources/js/jquery.easing.min.js',
                'resources/js/custom.js',
                'resources/js/bootstrap.min.js',
                'resources/js/owl.carousel.min.js',
                'resources/js/script.js',
                
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
});
