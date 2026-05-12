<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature   = 'sitemap:generate';
    protected $description = 'Generate XML sitemap untuk ACMI';

    public function handle()
    {
        $sitemap = Sitemap::create()
            // Halaman utama — prioritas tertinggi
            ->add(
                Url::create('/')
                    ->setPriority(1.0)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            )
            // Halaman Board
            ->add(
                Url::create('/board')
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            )
            // Halaman Products
            ->add(
                Url::create('/products')
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            )
            // Halaman Gallery
            ->add(
                Url::create('/gallery')
                    ->setPriority(0.7)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            )
            // Halaman Membership
            ->add(
                Url::create('/membership')
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            )
            // Halaman On Topik
            ->add(
                Url::create('/ontopic')
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );

            // Nanti saat CMS sudah siap, tambahkan di sini:
            // foreach ($articles as $article) {
            //     $sitemap->add(
            //         Url::create('/ontopic/' . $article['slug'])
            //             ->setPriority(0.9)
            //             ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            //     );
            // }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ Sitemap berhasil di-generate!');
    }
}