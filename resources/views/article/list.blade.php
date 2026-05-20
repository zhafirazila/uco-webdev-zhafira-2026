<x-template title="Daftar Artikel">
    <a href="<?= route('article.create')?>">Tambah artikel</a>
    @if(!empty($articles))
    @foreach($articles as $article)
        <div>
            <h4><?= $article['title'] ?></h4>
            <?= $article['content'] ?>
            <div>
                <small><?= $article['date'] ?></small>
            </div>
        </div>
        <hr/>
    @endforeach
    @endif
</x-template>
