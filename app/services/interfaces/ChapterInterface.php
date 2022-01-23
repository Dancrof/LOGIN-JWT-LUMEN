<?php

namespace App\Services\Interfaces;

interface ChapterInterface {

    /** 
     * @param array $chapter
     * @return void
     */
    function createChapter(array $chapter);

    /** 
     * @return Chapters
     */
    function getChapters(string $seacrh);

    /** 
     * @param int $id
     * @return Chapter
     */
    function getChapter(int $id);

    /** 
     * @param array $chapter
     * @param int $id 
     * @return void
     */
    function updateChapter(array $chapter, int $id);

    /** 
     * @param int $id
     * @return void
     */
    function deleteChapter(int $id);    
}