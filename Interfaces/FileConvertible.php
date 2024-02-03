<?php

namespace Interfaces;

interface FileConvertible
{
    public function toString(): string;
    public function toHTML(): string;
    public function toJSON(): string;
    public function toArray(): array;
    public function toMarkdown(): string;
}