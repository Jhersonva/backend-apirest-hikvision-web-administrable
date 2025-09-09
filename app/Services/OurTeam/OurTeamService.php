<?php 

namespace App\Services\OurTeam;

use App\Models\OurTeam;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class OurTeamService
{
    public function getAll()
    {
        return OurTeam::with('specialtyCategory')->get();
    }

    public function create(array $data): OurTeam
    {
        // Guardar imagen
        if (isset($data['img_our_team']) && $data['img_our_team'] instanceof UploadedFile) {
            $path = $data['img_our_team']->store('our_team', 'public');
            $data['img_our_team'] = $path;
        }

        // Generar URLs de contacto
        $data['contact_url_whatsapp'] = $this->generateWhatsappUrl($data['contact_value_whatsapp']);
        $data['contact_url_celular'] = $this->generateCelularUrl($data['contact_value_celular']);

        return OurTeam::create($data)->load('specialtyCategory');
    }

    public function update(OurTeam $ourTeam, array $data): OurTeam
    {
        // Imagen
        if (isset($data['img_our_team']) && $data['img_our_team'] instanceof UploadedFile) {
            if ($ourTeam->img_our_team && Storage::disk('public')->exists($ourTeam->img_our_team)) {
                Storage::disk('public')->delete($ourTeam->img_our_team);
            }
            $path = $data['img_our_team']->store('our_team', 'public');
            $data['img_our_team'] = $path;
        } else {
            unset($data['img_our_team']);
        }

        // URLs de contacto
        if (isset($data['contact_value_whatsapp'])) {
            $data['contact_url_whatsapp'] = $this->generateWhatsappUrl($data['contact_value_whatsapp']);
        }

        if (isset($data['contact_value_celular'])) {
            $data['contact_url_celular'] = $this->generateCelularUrl($data['contact_value_celular']);
        }

        $ourTeam->update($data);

        return $ourTeam->refresh()->load('specialtyCategory');
    }

    public function delete(OurTeam $ourTeam): bool
    {
        if ($ourTeam->img_our_team && Storage::disk('public')->exists($ourTeam->img_our_team)) {
            Storage::disk('public')->delete($ourTeam->img_our_team);
        }

        return $ourTeam->delete();
    }

    private function generateWhatsappUrl(string $value): string
    {
        return "https://api.whatsapp.com/send?phone=51{$value}";
    }

    private function generateCelularUrl(string $value): string
    {
        return "tel:+51{$value}";
    }
}