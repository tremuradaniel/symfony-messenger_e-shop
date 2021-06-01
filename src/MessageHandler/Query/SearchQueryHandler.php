<?php
    namespace App\MessageHandler\Query;

    use App\Message\Query\SearchQuery;

    class SearchQueryHandler {
        public function __invoke(SearchQuery $searchQuery)
        {
            // call DB
            sleep(1);
            var_dump($searchQuery);
            return ' result from DB';
        }
    }
