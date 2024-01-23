<?php
/* S: Zasada pojedynczej odpowiedzialności - Single Responsibility Principle Violation */

class ReportLog
{
    public function getTitle()
    {
        return 'Report Title';
    }

    public function getDate()
    {
        return '2016-04-21';
    }

    public function getContents()
    {
        return [
            'title' => $this->getTitle(),
            'date' => $this->getDate(),
        ];
    }

    public function formatJson()
    {
        return json_encode($this->getContents());
    }
}

/* Refactored */
class ReportLog
{
    public function getTitle()
    {
        return 'Report Title';
    }

    public function getDate()
    {
        return '2016-04-21';
    }

    public function getContents()
    {
        return [
            'title' => $this->getTitle(),
            'date' => $this->getDate(),
        ];
    }
}

interface ReportFormattable
{
    public function format(ReportLog $reportlog);
}

class JsonReportFormatter implements ReportFormattable
{
    public function format(ReportLog $reportlog)
    {
        return json_encode($reportlog->getContents());
    }
}
