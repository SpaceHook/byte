import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                '@resources/css/app.scss',
                '@resources/js/app.js',
                '@resources/js/banner_section.js',
                '@resources/css/main_page/index.scss',
                '@resources/css/main_page/banner_section.scss',
                '@resources/css/main_page/courses_section.scss',
                '@resources/css/main_page/form_section.scss',
                '@resources/css/main_page/news_section.scss',
                '@resources/css/main_page/contact_section.scss',
                '@resources/css/main_page/question_section.scss',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@public': path.resolve(__dirname, 'public'),
            '@resources': path.resolve(__dirname, 'resources'),
        },
    },
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `@import "@resources/css/mixins.scss";`,
            },
        },
    },
    base: '/byte/',
});
