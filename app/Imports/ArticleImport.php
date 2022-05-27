<?php

namespace App\Imports;

use App\Models\Article;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ArticleImport implements ToCollection, SkipsEmptyRows, WithHeadingRow, WithValidation, SkipsOnError, SkipsOnFailure
{
    use Importable;
    use SkipsErrors;
    use SkipsFailures;

    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            Article::query()->create([
                'en' => [
                    'title' => $item['en_title'],
                    'description' => $item['en_description'],
                    'seo_keywords' => $item['en_seo_keywords'],
                    'seo_description' => $item['en_seo_description'],
                    'article' => $item['en_article'],
                ],
                'ar' => [
                    'title' => $item['ar_title'],
                    'description' => $item['ar_description'],
                    'seo_keywords' => $item['ar_seo_keywords'],
                    'seo_description' => $item['ar_seo_description'],
                    'article' => $item['ar_article'],
                ],
                'slug' => $item['slug'],
                'publish' => (bool)$item['publish']
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '*.en_title' => ['required', 'string', Rule::unique('article_translations', 'title')],
            '*.en_description' => ['required', 'string'],
            '*.en_seo_keywords' => ['nullable', 'string'],
            '*.en_seo_description' => ['nullable', 'string'],
            '*.ar_title' => ['required', 'string', Rule::unique('article_translations', 'title')],
            '*.ar_description' => ['required', 'string'],
            '*.ar_seo_keywords' => ['nullable', 'string'],
            '*.ar_seo_description' => ['nullable', 'string'],
            '*.slug' => ['required', 'string', Rule::unique('articles', 'slug')],
            '*.publish' => ['nullable']
        ];
    }
}
