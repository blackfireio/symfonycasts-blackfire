<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\CommentRepository;

class CommentHelper
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {

        $this->commentRepository = $commentRepository;
    }

    public function countRecentCommentsForUser(User $user): int
    {
        return $this->commentRepository
            ->countForUser($user, new \DateTimeImmutable('-3 months'));
    }
}
