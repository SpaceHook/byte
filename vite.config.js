import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    base: '/',
    plugins: [
        laravel({
            input: [
                '@resources/css/app.scss',
                '@resources/css/form.scss',
                '@resources/js/app.js',
                '@resources/js/banner_section.js',
                '@resources/js/countdown.js',
                '@resources/js/form.js',
                '@resources/js/admin/index.js',
                '@resources/css/main_page/index.scss',
                '@resources/css/main_page/banner_section.scss',
                '@resources/css/main_page/courses_section.scss',
                '@resources/css/main_page/form_section.scss',
                '@resources/css/main_page/news_section.scss',
                '@resources/css/main_page/contact_section.scss',
                '@resources/css/main_page/question_section.scss',
                '@resources/css/course/index.scss',
                '@resources/css/course/about_section.scss',
                '@resources/css/course/gallery_section.scss',
                '@resources/css/course/main_section.scss',
                '@resources/css/admin/index.scss',
                '@resources/css/admin/banners.scss',
                '@resources/css/admin/menu.scss',
                '@resources/css/admin/courses.scss',
                '@resources/css/admin/info.scss',
                '@resources/css/admin/submissions.scss',
                '@resources/css/admin/create.scss',
                '@resources/css/admin/edit.scss',
                '@resources/css/admin/seo.scss',
                '@resources/css/admin/auth.scss',
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
});
